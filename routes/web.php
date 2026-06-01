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

Route::post('/keep', [KeepController::class, 'store'])
->name('keep.store');

Route:: get('/keep/{nota}/edit', [KeepController::class, 'edit'])
->name('keep.edit');

Route::put('/keep/{nota}', [KeepController::class, 'update'])
->name('keep.update');

Route::delete('/keep/{nota}', [KeepController::class, 'destroy'])
->name('keep.destroy');


Route::get('/hello', function(){
    return 'Hello pessoal   ';
});

Route::get('/num/{n}', function($n){
    return 'Numero: ' . $n;
});

Route::get('/calc/{n1}/{n2}', function($n1, $n2){
    return $n1 + $n2;
});