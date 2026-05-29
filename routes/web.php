<?php

use App\Http\Controllers\KeepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route:: get('/keep', [KeepController::class, 'index' ])
->name('keep.index');

Route:: get('/keep/create', [KeepController::class, 'create' ])
->name('keep.create');


Route::get('/hello', function(){
    return 'Hello pessoal   ';
});

Route::get('/num/{n}', function($n){
    return 'Numero: ' . $n;
});

Route::get('/calc/{n1}/{n2}', function($n1, $n2){
    return $n1 + $n2;
});