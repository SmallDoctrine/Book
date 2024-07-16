<?php

namespace App\Http\Controllers\CartController;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{


    public function index ()
    {
        return view('components.cart.index',['tokens'=>Cart::content()]);
    }
    public function store(Request $request)
    {
        $token=[
            'name' => (string) $request->input('name'),
            'id' => (int) $request->input('id'),
            'count' =>(float)$request->input('count'),
        ];

        Cart::add($token['name'],$token['id'],$token['count']);
        return redirect()->back()->with('up' ,'Товар добавлен');
    }

    public function clear()
    {
        Cart::clear();
    }


    public  function remove($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('up' ,'Товар удален! ');
    }



    // send - 54 lesson
    public function send (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'wallet' => 'required'
            ]);

        $cart = Cart::content();

        try {
            DB::beginTransaction();
            $orderID=Order::create([
                'user_id' => Auth::user()->id,
                'total_price' =>Cart::total(),
                'wallet' => $request->input('wallet') ,
                'qty' => Cart::totalQuantity(),
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('down' , 'ошибка в заказе') ;
        }
            if (is_null($orderID))
            {
                DB::rollBack();
                return redirect()->back()->with('down' , 'ошибка в заказе') ;
            }
            DB::commit();



            foreach ($cart as $item)
            {
                OrderItems::create(
                    [
                        'Books_id' => $item['id'],
                        'order_id'=> $orderID->id,
                        'qty'=> $item['quantity'],
                        'total_price'=>  $item['count'] * $item['quantity'] ,
                ]);

            }

             return redirect()->back()->with('up' , 'Заказ оформлен!') ;


    }


}
