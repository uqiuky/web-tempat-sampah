<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\DataController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/employee', [LoginController::class, 'create']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/', 'App\Http\Controllers\DashboardController@index')->middleware('auth');

// Route::get('/tambah_pekerja', function () {
//     return view('register',);
// })->middleware('auth');

// Route::get('/edit_bio', function () {
//     return view('edit',);
// })->middleware('auth');



Route::get('/data', function () {
    return view('data',);
})->middleware('auth');

// Route::get('/account', function () {
//     return view('account');
// })->middleware('auth');

Route::resource('/pekerja', DashboardUserController::class)->middleware('auth');

Route::resource('/', TrashController::class)->middleware('auth');

// Route::get('/employee', 'App\Http\Controllers\TrashController@create');