<?php

namespace App\Services\Cart;

use Illuminate\Session\SessionManager;

class Cart
{
    const  MIN_COUNT = 1;
    const  DEFAULT_INSTANCE = 'token_shop';
    protected SessionManager $session ;

    // $manager - является экземлпяром класса сессион манаджер в котором доступны различные функции для работы  с сессиями

public function __construct ( SessionManager $session)
{
        $this->session = $session ;
}
//привязали к защищенной переменной session обект класса(session manager)->  дальнейщее взаимдействие с сессия через session!

protected function getContent ()
{
    return $this->session->has(self::DEFAULT_INSTANCE) ?
        $this->session->get(self::DEFAULT_INSTANCE) : collect([]);
}

protected function  addCartItems( $id , string $name , float $count , int $quantity)
{
    if ($quantity < self::MIN_COUNT)
    {
        ($quantity = self::MIN_COUNT) ;
    }

    return collect([
         'id'=>$id,
         'name'=>$name,
         'count'=>$count,
         'quantity'=>$quantity,
    ]);

}



}
