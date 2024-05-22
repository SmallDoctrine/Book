<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthCreate;
use App\Repositories\auth\AuthRepositoriesInterface;

class AuthController extends Controller
{
    private $rep ;
    public function __construct(AuthRepositoriesInterface $repositories)
    {
        $this->rep = $repositories;
    }

    public function create()
    {
       return $this->rep->create();
    }

    public function createStore(AuthCreate $request)
    {
        $this->rep->createStore($request->all());
        return redirect()->route('table.Home')->with('up','Регистрация прошла успешно !');

    }
}
