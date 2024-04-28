<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBooks;
use App\Http\Requests\UpdateBooks;
use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{


    public function index(Request $request)
    {
        $check = Books::where('years', '>', $request->filled('years') ? $request->input('years') : 0)
            ->orderBy($request->filled('sort') ? $request->input('sort') : 'id',
                $request->filled('order') ? $request->input('order'):'desc')->get();
        return view('components.CRUD.index', ['check' => $check]);
    }


    public function create()
    {
        return view('components.CRUD.create-form');
    }

    public function createStore(CreateBooks $request)
    {
        Books::create($request->all());
        return redirect()->back()->with('add', ' ваша книга добавлена!');
    }

    public function update(int $id, Request $request)
    {
        $Books = Books::find($id);
        //если передаем id в квери которых нет в таблице делаем проверку и редирект на выбранную страницу(route)
        if (is_null($Books)) {
            return redirect()->route('books.homepage');
        }
        return view('components.CRUD.update-form', ['Books' =>$Books]);
    }

    public function updateStore(int $id, UpdateBooks $request)
    {
        Books::where('id', $id)->update($request->all());
        return redirect()->back()->with('up', 'Книга Обновлена !');
    }


    public function destroy(int $id, Request $request)
    {
        Books::destroy($id);
        return redirect()->route('books.homepage')->with('up','Запись удалена');
    }


    public function show(int $id, Request $request)
    {
        $m = Books::find($id);
        return view('components.CRUD.show',['item'=>$m]);
    }
}



