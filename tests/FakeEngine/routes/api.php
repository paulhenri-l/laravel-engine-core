<?php

use Illuminate\Support\Facades\Route;

Route::get('api-hello', 'ApiHelloController@index')->name('api_hello.index');
