<?php

use App\Http\Controllers\BolosController;
use App\Http\Controllers\EmailsController;
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
#BOLOS
Route::get('/',[BolosController::class, 'index']);
Route::resource('bolos', BolosController::class);
Route::get('emails/form', [EmailsController::class, 'form']);

#EMAILS
Route::resource('emails', EmailsController::class);
