<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\token\TokenRepositoriesInterface;

class ApiTokensControllers
{
    private $rep ;
    public function  __construct (TokenRepositoriesInterface $repositories)
    {
        $this->rep = $repositories ;
    }


    public function index ()
    {
        $result=$this->rep->GetList();
        return response()->json($result);

    }

    public function show(int $id)
    {
        //todo - one token

    }


    public function update(int $id)
    {
        //todo - update

    }



    public function destroy(int $id)
    {
        //todo  - delete
    }

}


