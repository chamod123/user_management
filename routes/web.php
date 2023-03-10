<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//create new user
Route::get('/User/NewUser', [App\Http\Controllers\HomeController::class, 'createUser'])->name('createUser');


Route::post('/User/Save', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('storeUser');


Route::get('/User/{id}/View', [App\Http\Controllers\HomeController::class, 'view_user_data'])->name('view_user_data');






//save new client
//Route::post('/Client/Save', 'ClientController@store');
//new client add screen
//Route::get('/User/NewUser', 'HomeController@createUser');

