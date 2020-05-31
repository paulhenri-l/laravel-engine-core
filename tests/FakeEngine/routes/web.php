<?php

use Illuminate\Support\Facades\Route;

Route::get('hello', 'HelloController@index')->name('hello.index');
