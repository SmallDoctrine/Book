<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBooks;
use App\Http\Requests\UpdateBooks;
use App\Repositories\token\TokenRepositoriesInterface;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    private $rep ;
    public function  __construct (TokenRepositoriesInterface $repositories)
    {
        $this->rep = $repositories ;
    }

    public function index(Request $request)
    {

        return view('components.CRUD.index', ['check'=> $this->rep->GetList($request->all())]);
    }


    public function create()
    {
        return view('components.CRUD.create-form');
    }

    public function createStore(CreateBooks $request)
    {
        $this->rep->createStore($request->all());
        return redirect()->back()->with ('up','Токен добавлен!');
    }

    public function update(string $name)
    {
        $Books = $this->rep->GetOne($name);
        if (is_null($Books)) {
            return redirect()->route('books.homepage');
        }
        return view('components.CRUD.update-form', ['Books' =>$Books]);
    }

    public function updateStore(string $name, UpdateBooks $request)
    {
        $this->rep->updateStore($name,$request->all()) ;
        return redirect()->back()->with('up', 'Книга Обновлена!');
    }


    public function destroy($name)
    {
            $this->rep->destroy($name);
        return redirect()->route('books.homepage')->with('up','Запись удалена');
    }


    public function show(string $name, Request $request)
    {
        $m = $this->rep->GetOne($name);
        if (is_null($m))
            return redirect()->back();
        return view('components.CRUD.show',['token'=>$m]);
    }
}



