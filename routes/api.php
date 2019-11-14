<?php

use App\Person;
use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('person', 'Api\V1\PersonController');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});