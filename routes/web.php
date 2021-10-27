<?php

use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [todoController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::post('/create', [todoController::class, 'store'])->name('todo.store');
    Route::delete('/delete/{id}', [todoController::class, 'destroy'])->name('todo.destroy');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('index');
})->name('home');
