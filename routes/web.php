<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PPPoEController;
use App\Http\Controllers\SellerController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('routerinfo', [AuthController::class, 'routerinfo'])->name('routerinfo');
});


Route::middleware(['auth', 'admin'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('home');
        Route::get('interface/data', [AuthController::class, 'interfaceData'])->name('interfaceData');


        Route::prefix('pppoe')->name('pppoe.')->group(function () {
            Route::get('/', [PPPoEController::class, 'routerUser'])->name('routerUser');
            Route::get('/routerUser', [PPPoEController::class, 'index'])->name('index');
            Route::get('/create', [PPPoEController::class, 'create'])->name('create');
            Route::post('/create', [PPPoEController::class, 'store'])->name('create');
            Route::get('/view/{id}', [PPPoEController::class, 'view'])->name('view');
            Route::post('/import', [PPPoEController::class, 'import'])->name('import');
            Route::get('/check', [PPPoEController::class, 'isActive'])->name('ActiveList');
            Route::post('/active/{id}', [PPPoEController::class, 'active'])->name('active');
            Route::post('/deactive/{id}', [PPPoEController::class, 'deactive'])->name('deactive');
            Route::post('/check', [PPPoEController::class, 'activeCheck'])->name('activeList');
            Route::post('/check/db', [PPPoEController::class, 'pppoeExistcheckDB'])->name('DbPPPoeCheck');
        });

        Route::prefix('sellers')->name('seller.')->group(function () {
            Route::get('/', [SellerController::class, 'index'])->name('index');
            Route::get('/create', [SellerController::class, 'create'])->name('create');
            Route::post('/create', [SellerController::class, 'store'])->name('store');
            Route::get('/{seller}/show', [SellerController::class, 'show'])->name('show');
            Route::get('/{seller}/edit', [SellerController::class, 'edit'])->name('edit');
            Route::put('/{seller}/update', [SellerController::class, 'update'])->name('update');
            Route::delete('/delete/{seller}', [SellerController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('package')->name('package.')->group(function () {
            Route::get('/', [PackagesController::class, 'index'])->name('index');
            Route::post('/import', [PackagesController::class, 'create'])->name('create');
            Route::get('/seller', [PackagesController::class, 'sellerPackage'])->name('sellerPackage');
            Route::get('/seller/packege', [PackagesController::class, 'sellerPackageById'])->name('sellerPackageById');
            Route::post('/seller/dedicate/{id}', [PackagesController::class, 'sellerPackageAssign'])->name('sellerPackageAssign');
            Route::post('/seller/dedicate', [PackagesController::class, 'sellerPackageDedicate'])->name('sellerPackageDedicate');
        });
    });
});
Route::middleware(['auth', 'seller'])->group(function () {

    Route::prefix('seller')->name('seller.')->group(function () {

        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('home');

        Route::prefix('pppoe')->name('pppoe.')->group(function () {
            Route::get('/', [PPPoEController::class, 'sellerPPPoeUsers'])->name('routerUser');
            Route::get('/create', [PPPoEController::class, 'create'])->name('create');
            Route::post('/create', [PPPoEController::class, 'store'])->name('create');
            Route::get('/check', [PPPoEController::class, 'isActiveSeller'])->name('ActiveList');
            Route::post('/check', [PPPoEController::class, 'activeCheckSeller'])->name('activeList');
        });


        Route::prefix('package')->name('package.')->group(function () {
            Route::get('/', [PackagesController::class, 'sellerPackages'])->name('index');
        });
    });
});
