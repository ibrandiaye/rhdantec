<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\MobiliteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});
Route::resource('emploi', EmploiController::class);
Route::resource('identification', IdentificationController::class);
Route::resource('mobilite', MobiliteController::class);
