<?php

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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\payementController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ListeController;

Route::get('/login',[AdminController::class,'login'])->name('login');
Route::post('/register',[AdminController::class,'register'])->name('register');
Route::post('/login',[AdminController::class,'login']);
Route::get('/register',[AdminController::class,'register']);

Route::middleware('auth')->group(function(){
    Route::get('/home',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[AdminController::class,'logout']);
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])-> name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])-> name('admin.update.password');
    Route::get('/calendrier',[AdminController::class,'calendrier']);

    Route::post('/admin/profile',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');

    Route::group(['prefix' => 'clients'],function(){
    Route::get('/ajouter_client',[ClientController::class,'ajouter_client'])->name('gerer.client');
    Route::get('/gerer_client',[ClientController::class,'gerer_client']);
    Route::post('/ajouter_client',[ClientController::class,'ajouter_client']);
    Route::get('/modifier_client/{id}',[ClientController::class,'modifier_client']);
    Route::post('/modifier_client/{id}',[ClientController::class,'modifier_client']);
    Route::get('/delete_client/{id}',[ClientController::class,'delete_client']);
});
Route::group(['prefix' => 'transactions'],function(){
Route::get('/transaction',[TransactionController::class,'transaction']);
});
Route::group(['prefix' => 'carts'],function(){
    Route::post('/ajouter_cart',[CartController::class,'index']);
    Route::post('/update_cart/{rowId}',[CartController::class,'update']);
    Route::post('/create_invoice',[CartController::class,'create_invoice']);
    Route::get('/remove_cart/{rowId}',[CartController::class,'remove_cart']);
    });
Route::group(['prefix' => 'rapports'],function(){
Route::get('/rapport',[RapportController::class,'rapport']);
});

Route::group(['prefix' => 'categories'],function(){
    Route::get('/ajouter_categorie',[CategorieController::class,'ajouter_categorie']);
    Route::get('/gerer_categorie',[CategorieController::class,'gerer_categorie'])->name('gerer.categorie');
    Route::post('/ajouter_categorie',[CategorieController::class,'ajouter_categorie']);
    Route::get('/modifier_categorie/{id}',[CategorieController::class,'modifier_categorie']);
    Route::post('/modifier_categorie/{id}',[CategorieController::class,'modifier_categorie']);
    Route::get('/delete_categorie/{id}',[CategorieController::class,'delete_categorie']);
});
Route::group(['prefix' => 'produits'],function(){
    Route::get('/ajouter_produit',[ProduitController::class,'ajouter_produit']);
    Route::get('/gerer_produit',[ProduitController::class,'gerer_produit'])->name('gerer.produit');
    Route::post('/ajouter_produit',[ProduitController::class,'ajouter_produit']);
    Route::get('/modifier_produit/{id}',[ProduitController::class,'modifier_produit']);
    Route::post('/modifier_produit/{id}',[ProduitController::class,'modifier_produit']);
    Route::get('/delete_produit/{id}',[ProduitController::class,'delete_produit']);
    

});
   
Route::group(['prefix' => 'factures'],function(){
Route::post('/facture',[FactureController::class,'facture'])->name('facture');
});
Route::group(['prefix' => 'payements'],function(){
    Route::get('/payement',[PayementController::class,'payement']);
    Route::get('/voir_produit/{id}',[PayementController::class,'voir_produit']);

    });
    Route::group(['prefix' => 'liste'],function(){
        Route::get('/produit',[ListeController::class,'liste']);
      
        });
});

