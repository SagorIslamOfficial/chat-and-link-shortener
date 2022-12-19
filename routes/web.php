<?php

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/url-shortener', [App\Http\Controllers\LinkShortener\LinkShortenerController::class, 'index'])->name('index');
Route::post('/url-shortener', [App\Http\Controllers\LinkShortener\LinkShortenerController::class, 'originalLink'])->name('original-link');
Route::get('/{link}', [App\Http\Controllers\LinkShortener\LinkShortenerController::class, 'getLink'])->name('get-link');
Route::delete('/{delete}', [App\Http\Controllers\LinkShortener\LinkShortenerController::class, 'destroy'])->name('destroy');
