<?php

namespace App\Repositories\token;

use App\Http\Requests\CreateBooks;
use App\Models\Books;
use Illuminate\Http\Request;

class TokenRepositories implements TokenRepositoriesInterface
{

    public function GetOne(string $name)
    {
       return  Books::where('name',$name)->first() ;
    }

    public function GetList(array $filter = [])
    {
        return
            Books::where('count', '>', $filter['count'] ?? 0)
            ->orderby( $filter['column'] ?? 'id' ,$filter['method'] ?? 'desc')
            ->get();
    }

    public function destroy($name)
    {
        // destroy - ждет входной параметр число получает строку
        Books::deleted($name);
    }

    public function createStore(Request $request)
    {
         return
             Books::create($request->all());
    }

    public function updateStore(string $name, $request)
    {
       return
           Books::where('name',$name)->update($request->all());
    }

    public function update($name)
    {
        return Books::where('name',$name)->first();
    }
}
