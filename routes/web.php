<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideogameController;

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

//Route::view('/', 'home'); // Pages without logic

Route::view('/', 'home')-> name('home');
Route::view('/users', 'users')-> name('users');
Route::get('/videogames', [VideogameController::class, 'index']) -> name('videogames.index');
Route::get('/videogames/create', [VideogameController::class, 'create']) -> name('videogames.create');
Route::post('/videogames/', [VideogameController::class, 'store']) -> name('videogames.store');
Route::get('/videogames/edit/{videogame}', [VideogameController::class, 'edit']) -> name('videogames.edit');
Route::patch('/videogames/{videogame}', [VideogameController::class, 'update']) -> name('videogames.update');
Route::delete('/videogames/{videogame}', [VideogameController::class, 'destroy']) -> name('videogames.destroy');