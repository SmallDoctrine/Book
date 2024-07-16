<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Jobs\updateLogCount;
use App\Repositories\auth\LoginRepositoriesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        private $rep;
    public function __construct(LoginRepositoriesInterface $repositories)
    {
        $this->rep = $repositories ;
    }


    public function index()
    {

       return $this->rep->index();
    }

    public function authenticate (Request $request)
    {



        $ident = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //принимает отвалидированный массив и возвращает true or false
        if (auth::attempt($ident))
        {
            $request->session()->regenerate();

            // for jobs
            $userID = Auth::user()->id ;
            updateLogCount::dispatch($userID);
            // for jobs


            return redirect()->route('user.dashboard');

        }
        return redirect()->route('authenticate')->with('error','Логин или пароль введен не верно!');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('books.homepage');


    }

    }

