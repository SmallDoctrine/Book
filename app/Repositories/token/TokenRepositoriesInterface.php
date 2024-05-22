<?php

namespace App\Repositories\token;


interface TokenRepositoriesInterface
{
    public function GetOne(string $name);
    public function GetList(array $filter = []);
    public function destroy($name);
    public function createStore(array $data);

    public function updateStore(string $name ,array $data);

}
