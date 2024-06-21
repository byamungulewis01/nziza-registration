<?php

use App\Http\Controllers\RegistrationController;
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

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/register', 'register')->name('register');
    Route::get('/success', 'success')->name('success');
});
