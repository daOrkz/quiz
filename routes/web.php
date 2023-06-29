<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/error', 'error')->name('error');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('quiz')->namespace('Quiz')->name('quiz.')->group(function(){
    // Route::get('/', 'IndexController')->name('index');
    Route::get('/create', 'CreateController')->name('create');
    Route::get('/check/{question}', 'CheckingAnswer')->name('check');
    Route::get('/show/{question?}', 'ShowController')->name('show');


    Route::post('/create', 'StoreController')->name('store');
});
