<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\Pemasukan\CategoriDebitController;
use App\Http\Controllers\Admin\Pengeluaran\CategoriCreditController;
use App\Http\Controllers\Admin\Pemasukan\UangMasukController;
use App\Http\Controllers\Admin\Pengeluaran\UangKeluarController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'viewLogin']);
    Route::post('/', [LoginController::class, 'prosesLogin']); 
    Route::get('/Register', [RegisterController::class, 'viewRegister']);
    Route::post('/Register', [RegisterController::class, 'prosesRegister']); 
});


Route::get('/home', function () {
    return redirect('/404NotFound');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/Logout', [LoginController::class, 'logout']);
    Route::get('/Dashboard', [HomeController::class, 'DashboardAdmin']);
    Route::get('/404NotFound', [HomeController::class, 'NotFound']);
    
    // Category Debit
    Route::get('/fetchallCategoryDebit', [CategoriDebitController::class, 'fetchAll'])->name('fetchAllCategoryDebit');
    Route::get('/CategoryDebit', [CategoriDebitController::class, 'index']);
    Route::post('/CategoryDebitInsert', [CategoriDebitController::class, 'inputCategory'])->name('inputCategoryDebit');
    Route::delete('/deleteCategory', [CategoriDebitController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/FormUpdateCategory', [CategoriDebitController::class, 'FormUpdateCategory'])->name('FormUpdateCategory');
    Route::post('/UpdateCategory', [CategoriDebitController::class, 'UpdateCategory'])->name('UpdateCategory');

    // Category Credit
    Route::get('/CategoryCredit', [CategoriCreditController::class, 'index']);
    Route::get('/fetchAllCategoryCredit', [CategoriCreditController::class, 'fetchAll'])->name('fetchAll');
    Route::post('/CategoryCreditInsert', [CategoriCreditController::class, 'inputCategoryCredit'])->name('inputCategoryCredit');
    Route::get('/FormEditCategory', [CategoriCreditController::class, 'FormEditCategory'])->name('FormEditCategory');
    Route::post('/EditCategory', [CategoriCreditController::class, 'EditCategory'])->name('EditCategory');
    Route::delete('/HapusCategory', [CategoriCreditController::class, 'HapusCategory'])->name('HapusCategory');

    // Transaksi Uang Masuk
    Route::get('/UangMasuk', [UangMasukController::class, 'viewUangMasuk']);;
    Route::get('/fetchAllUangMasuk', [UangMasukController::class, 'fetchAllUangMasuk'])->name('fetchAllUangMasuk');
    //Route::post('/InsertUangMasuk', [UangMasukController::class, 'inputUangMasuk'])->name('inputUangMasuk');

    // Transaksi Uang Keluar
    Route::get('/UangKeluar', [UangKeluarController::class, 'index']);
    Route::get('/fetchAllUangKeluar', [UangKeluarController::class, 'fetchAllUangKeluar'])->name('fetchAllUangKeluar');
});