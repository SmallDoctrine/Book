<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (Request $request)
    {
        $mm = Books::orderby('years','desc')->limit(5)->get();
        return view('components.homepage.HP',['Books'=>$mm]);
    }

}
