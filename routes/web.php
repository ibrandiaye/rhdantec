<?php

use App\Http\Controllers\AutorisationController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProlongationController;
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
    return view('home');
})->name("layout");
Route::resource('emploi', EmploiController::class)->middleware("auth");
Route::resource('identification', IdentificationController::class)->middleware("auth");
Route::resource('mobilite', MobiliteController::class)->middleware("auth");

Route::resource('bureau', BureauController::class)->middleware("auth");
Route::resource('csp', CspController::class)->middleware("auth");
Route::resource('division', DivisionController::class)->middleware("auth");
Route::resource('famillepro', FamilleProController::class)->middleware("auth");
Route::resource('fonction', FonctionController::class)->middleware("auth");
Route::resource('naturecontrat', NatureContratController::class)->middleware("auth");
Route::resource('responsabilite', ResponsabiliteController::class)->middleware("auth");
Route::resource('service', ServiceController::class)->middleware("auth");
Route::resource('titre', TitreController::class)->middleware("auth");
Route::resource('typecontrat', TypeContratController::class)->middleware("auth");
Route::resource('employeur', EmployeurController::class)->middleware("auth");
Route::resource('document', DocumentController::class)->middleware("auth");
Route::resource('categorie', CategorieController::class)->middleware("auth");
Route::resource('candidat', CandidatController::class)->middleware("auth");
Route::resource('autorisation', AutorisationController::class)->middleware("auth");
Route::resource('prolongation', ProlongationController::class)->middleware("auth");
Route::get('/prolongation/candidat/{id}/{candidat}', [ProlongationController::class,'getCandidatId'])->name('prolonger.by.id');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");

Route::get('/gestion/stage', function () {
    return view('gestion_stage');
})->name("gestion.stage")->middleware("auth");
