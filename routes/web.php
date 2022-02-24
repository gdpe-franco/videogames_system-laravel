<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideogamesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/', function(){
    $name = "Franco";
    return view('home',compact('name'));
}) -> name ('home'); */

//Route::view('/', 'home'); // Pages without logic

Route::view('/', 'home')-> name('home');
Route::view('/users', 'users')-> name('users');
Route::get('/videogames', [VideogamesController::class, 'index']) -> name('videogames');