<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tokens')->group(function (){
    Route::get('/',[\App\Http\Controllers\Api\v1\ApiTokensControllers::class,'index']);

});
