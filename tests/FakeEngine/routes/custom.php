<?php

use Illuminate\Support\Facades\Route;

Route::get('custom-hello', 'CustomHelloController@index')->name('custom_hello.index');
