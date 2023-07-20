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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Route::view('/error', 'error')->name('error');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('quiz')->middleware(['auth'])->namespace('Quiz')->name('quiz.')->group(function(){
    Route::get('/', 'IndexController')->name('index');
    Route::get('/create', 'CreateController')->name('create');
    Route::get('/check/{question}', 'CheckingAnswer')->name('check');
    // Route::get('/{question}', 'ShowController')->where('question', '[0-9]+')->name('show');
    Route::get('/{question}/edit', 'EditController')->where('question', '[0-9]+')->name('edit');
    Route::get('/take/{question?}', 'TakeQuizController')->name('take-quiz');

    Route::get('/admin', 'AdminController')->name('admin');


    Route::post('/create', 'StoreController')->name('store');
    Route::patch('/{question}', 'UpdateController')->where('question', '[0-9]+')->name('update');
    Route::delete('/{question}', 'DestroyController')->where('question', '[0-9]+')->name('destroy');
});
