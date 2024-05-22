<?php

namespace App\Repositories\token;

use App\Models\Books;

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
        Books::deleted($name);
    }

    public function createStore(array $data)
    {
         return Books::create($data);
    }

    public function updateStore(string $name, array $data)
    {
       return
           Books::where('name',$name)->update($data);
    }

}
