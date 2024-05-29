<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index (){

        return view ('components.User.Dashboard');
}


}
