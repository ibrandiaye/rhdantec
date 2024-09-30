<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\MobiliteController;

use App\Http\Controllers\BureauController;
use App\Http\Controllers\CspController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FamilleProController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\NatureContratController;
use App\Http\Controllers\ResponsabiliteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TitreController;
use App\Http\Controllers\TypeContratController;
use App\Http\Controllers\EmployeurController;

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
})->name("layout");
Route::resource('emploi', EmploiController::class);
Route::resource('identification', IdentificationController::class);
Route::resource('mobilite', MobiliteController::class);

Route::resource('bureau', BureauController::class);
Route::resource('csp', CspController::class);
Route::resource('division', DivisionController::class);
Route::resource('famillepro', FamilleProController::class);
Route::resource('fonction', FonctionController::class);
Route::resource('naturecontrat', NatureContratController::class);
Route::resource('responsabilite', ResponsabiliteController::class);
Route::resource('service', ServiceController::class);
Route::resource('titre', TitreController::class);
Route::resource('typecontrat', TypeContratController::class);
Route::resource('employeur', EmployeurController::class);
Route::resource('document', DocumentController::class);
Route::resource('categorie', CategorieController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
