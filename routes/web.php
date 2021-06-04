<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AppController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::view('input', 'input');
Route::view('alpine-animate', 'alpine-animate');

Route::get('puts', [AppController::class, 'putSession']);
Route::get('gets', [AppController::class, 'getSession']);

require __DIR__.'/auth.php';
