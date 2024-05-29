<?php

namespace App\Repositories\auth;

use Illuminate\Support\Facades\Auth;

class LoginRepositories implements LoginRepositoriesInterface
{

    public function index()
    {
        return view('components.auth.login');
    }

}
