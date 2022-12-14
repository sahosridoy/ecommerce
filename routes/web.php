<?php

use App\Http\Controllers\AuthController;
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



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('registration', [AuthController::class, 'submitRegistration'])->name('register.submit');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('dashboard', [AuthController::class, 'dashboard']);
