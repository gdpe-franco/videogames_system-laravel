<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideogameController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ConsoleController;

/* DB::listen(function($query){
    var_dump($query->sql);
}); */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/', 'home')-> name('home');

Route::resource('videogames', VideogameController::class);

Route::get('ratings/{rating}', [RatingController::class, 'show'])->name('ratings.show');

Route::get('consoles/{console}', [ConsoleController::class, 'show'])->name('consoles.show');

