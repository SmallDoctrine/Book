<?php

namespace App\Repositories\auth;

interface AuthRepositoriesInterface
{
    public function create();
    public function createStore(array $request);
}
