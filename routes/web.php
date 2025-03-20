<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\DetailsCommandesController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\StatsController;
use App\Models\DetailsCommandes;
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

Route::get('/login', [AuthController::class,'login'])->name('auth.login');
Route::delete('/logout', [AuthController::class,'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class,'dologin']);

// ROUTE DU PARTIE CLIENT
Route::prefix('/')->name('')->group(function () {
    Route::get('/', [ProduitsController::class, 'indexbis'])->name('accueil');
    Route::get('/menu', [ProduitsController::class, 'indexmenu'])->name('menu');
    Route::get('/panier', [ProduitsController::class, 'indexpanier'])->name('panier');
    Route::get('/commande', [CommandesController::class, 'create'])->name('commande');


});
;


//ROUTE POUR LA PARTIE ADMIN
Route::prefix('/admin')->name('admin.')->group(function () {

    Route::get('/produits', [ProduitsController::class, 'index'])->name('produits')->middleware('auth');;
    Route::get('/produits/add', [ProduitsController::class, 'create'])->name('addProduits');
    Route::post('/produits/save', [ProduitsController::class, 'store'])->name('saveProduits');
    Route::delete('/produits/delete/{id}', [ProduitsController::class, 'destroy'])->name('deleteProduits');
    Route::get('/produits/edit/{id}', [ProduitsController::class, 'edit'])->name('editProduits');
    Route::put('/produits/update/{id}', [ProduitsController::class, 'update'])->name('updateProduits');

    Route::get('/commandes', [CommandesController::class, 'index'])->name('commandes');
    Route::post('/commandes/save', [CommandesController::class, 'store'])->name('saveCommandes');
    Route::delete('/commandes/delete/{id}', [CommandesController::class, 'destroy'])->name('deleteCommandes');
    Route::get('/commandes/edit/{id}', [CommandesController::class, 'edit'])->name('editCommandes');
    Route::put('/commandes/update/{id}', [CommandesController::class, 'update'])->name('updateCommandes');

            //Route::get('/detailscommandes', [DetailsCommandesController::class, 'index'])->name('detailscommandes');
    Route::get('/commandes/{id}/details', [CommandesController::class, 'show'])->name('commandedetails');

    Route::get('/stats', [StatsController::class, 'index'])->name('stats');
    Route::get('/stats/{year?}', [StatsController::class, 'getChartData']); // Route AJAX





});



Route::post('/ajouterpanier', [PanierController::class, 'ajouterAuPanier'])->name('ajouterpanier');

Route::delete('/supprimerpanier/{id}', [PanierController::class, 'supprimerDuPanier'])->name('supprimerpanier');
//Route::delete('/updatepanier', [PanierController::class, 'modifieDuPanier'])->name('updatepanier');
