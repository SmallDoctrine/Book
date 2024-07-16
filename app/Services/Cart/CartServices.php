<?php

namespace App\Services\Cart;

use function Laravel\Prompts\select;

class CartServices extends  Cart
{

    //52 lesson
    public function add( $id , string $name , float $count , int $quantity =1 )
    {
        $cartItems = $this->addCartItems($id, $name, $count, $quantity);
        // функия create cart items  создает коллекцию в которой уже есть массив с данными

        $content = $this->getContent();
        //вызывавает массив  указанный в текущем инстансе созданный благодоря креет кар итем

        if ($content->has($id)) {
            // put - 2  прнимает 2 параметра ключ  и значение
            $cartItems->put('quantity', $content->get($id)->get('quantity') + $quantity);
            //проверяем если в текущей сессии есть товар проверяем тут по id , обращаемся к колекции которая была ранее создана
            // обращаемся к колонке quantity в текущему инстансу
        }
        $content->put($id, $cartItems);
        // в переменкюю контент мы помещаем массив который запищется в сессию ) этот массив будет значением для ключа default instance

         $this->session->put(self::DEFAULT_INSTANCE , $content);
         // теперь в сессиях добавлен контент с массивом по ключу и значению
    }


    public function update( $id ,  string $action)
    {
        $content = $this->getContent();
        if ($content->has($id)) {
            $CartItem = $content->get($id);

            switch ($action) {
                case 'increment':
                    $CartItem->put('quantity', $content->get($id)->get('quantity') + 1);
                    break;
                case 'decrement':
                    $updateQuantity = $content->get($id)->get('quantity') - 1;
                    if ($updateQuantity < self::MIN_COUNT) {
                        $updateQuantity = self::MIN_COUNT;
                    }
                    $CartItem->put('quantity', $updateQuantity);
                    break;

            }
            $content->put($id, $CartItem);
            $this->session->put(self::DEFAULT_INSTANCE, $content);
        }
    }

    public function remove ( $id )
    {
            $content=$this->getContent();
            if ($content->has($id)){
                $this->session->put(self::DEFAULT_INSTANCE , $content->except($id));
                // except - удалаяет массив с указанным id(входным параметром) из корзины
            }
    }


    public function clear ()
    {
        $this->session->forget(self::DEFAULT_INSTANCE);
        // forget - удаляет все товары с корзины ,а точнее удаляют все сессии по данному инстансу )
    }

    public function content ()
    {
         return is_null($this->session->get(self::DEFAULT_INSTANCE)) ? collect([])  :
             $this->session->get(self::DEFAULT_INSTANCE) ;
    }

    public function total()
    {
        $content=$this->getContent();
         return $content->reduce(function ($total , $item) {
            return(float)$total += $item->get((float)'count') * $item->get('quantity');
        });

    }

    public function TotalQuantity()
    {
        $content=$this->getContent();
        return $content->count();

    }


}
