<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/login', [ClientController::class, 'form_login']);
Route::get('/register', [ClientController::class, 'form_register']);

Route::post('/register/traitement', [ClientController::class, 'traitement_register']);
Route::post('/login/traitement', [ClientController::class, 'traitement_login']);

Route::get('/espace-client', [ClientController::class, 'espace_membre']);

Route::get('/logout', [ClientController::class, 'logout']);
