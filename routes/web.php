<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [EvenementController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index']);

Route::prefix('association')
    ->middleware(['auth:sanctum', 'association'])
    ->controller()
    ->group(function () {
        Route::get('/info', [AssociationController::class, 'infosAssoc']);
        Route::post('/info/enregistrer', [AssociationController::class, 'store'])->name('EregistrerInfo');
        Route::get('/dashboard', [AssociationController::class, 'index']);
        Route::get('/ajouterEven', [EvenementController::class, 'create']);
        Route::post('/ajouterEven', [EvenementController::class, 'store'])->name('ajouterEven');
        Route::get('/voirEven/{id}', [EvenementController::class, 'show']);
        Route::get('/modifierEven/{id}', [EvenementController::class, 'edit']);
        Route::patch('/modifierEven/{id}', [EvenementController::class, 'update'])->name('modifierEven');
        Route::delete('/supprimerEven/{id}', [EvenementController::class, 'destroy'])->name('supprimerEven');
        Route::patch('/fermerEven/{id}', [EvenementController::class, 'fermerEven'])->name('fermerEven');
    });

Route::prefix('client')
    ->middleware('auth:sanctum')
    ->controller(ClientController::class)
    ->group(function () {
        Route::get('/info', 'infosClient');
        Route::post('/infos/enregistrer', 'store')->name('EregistrerinfosClient');
        Route::get('/dashboard', 'index');
        Route::get('/reserver/evenement/{id}', 'show');
        Route::post('/reserver/{id}', 'reserver')->name('reserver');
        Route::patch('/reservation/{id}/refuser/{id_user}', 'refuser')->name('refuser');
    });
