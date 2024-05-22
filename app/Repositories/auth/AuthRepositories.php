<?php

namespace App\Repositories\auth;

use App\Models\User;

class AuthRepositories implements AuthRepositoriesInterface
{

    public function create()
    {
        return view('components.auth.create-form');
    }

    public function createStore( array $request )
    {
        User::create($request);

    }
}
