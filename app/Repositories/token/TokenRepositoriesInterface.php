<?php

namespace App\Repositories\token;


use Illuminate\Http\Request;

interface TokenRepositoriesInterface
{
    public function GetOne(string $name);
    public function GetList(array $filter = []);
    public function destroy($name);
    public function createStore(Request $request);

    public function updateStore(string $name ,$request);
    public function update($name);

}
