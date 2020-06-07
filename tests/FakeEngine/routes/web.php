<?php

use Illuminate\Support\Facades\Route;

Route::get('hello', 'HelloController@index')->name('hello.index');

Route::get('/assets-autoloading', function () {
    return <<<HTML
<html>
    <head>
        <title>Hello World!</title>
    </head>
    <body>
        Hello World!
    </body>
</html>
HTML;
})->name('assets_autoloading.index');
