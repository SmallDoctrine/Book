<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index (Request $request)
    {
        if ($request->filled('update_price')&&$request->input('update_price')===1)
        {
            Artisan::call('Books:count_update');
        }
        $mm = Books::orderby('years','desc')->get();
        return view('components.homepage.HP',['Books'=>$mm]);
    }

}
