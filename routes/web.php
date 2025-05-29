<?php

use App\Http\Controllers\TodoController;
use Illuminate\Routing\RouteGroup;
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

Route::middleware(['auth'])->group(function () {
Route::get('/', [TodoController::class, 'index']);
Route::get('/todo/create', [TodoController::class, 'create'])->middleware('auth')->name('todo.create');
Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/todo/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
Route::post('/todo/store', [TodoController::class, 'store'])->name('todo.store');    
});


Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [
    'as' => 'register',
    'uses' => 'App\Http\Controllers\SessionController@register'
]);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\SessionController@login'
]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'App\Http\Controllers\SessionController@logout'
]);