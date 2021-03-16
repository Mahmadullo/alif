<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhoneController;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contact/create', [ContactController::class, 'store']);
Route::get('/contact/edit/{contact}', [ContactController::class, 'edit'])->name('edit.contact');
Route::post('/contact/update', [ContactController::class, 'update']);
Route::delete('/contact/delete/{contact}', [ContactController::class, 'destroy']);

// Phones
Route::post('/phone/create', [PhoneController::class, 'store']);
Route::post('/phone/update', [PhoneController::class, 'update']);
Route::delete('/phone/delete/{phone}', [PhoneController::class, 'destroy']);

// Emails
Route::post('/email/create', [EmailController::class, 'store']);
Route::post('/email/update', [EmailController::class, 'update']);
Route::delete('/email/delete/{email}', [EmailController::class, 'destroy']);
