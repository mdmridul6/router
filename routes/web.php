<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PPPoEController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    return "Cache Cleared";
});
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

        Route::prefix('settings')->name('setting.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::post('create', [SettingController::class, 'store'])->name('store');
        });
        Route::prefix('balence')->name('balence.')->group(function () {
            Route::get('/add', [SellerController::class, 'balence'])->name('add');
            Route::post('/add', [SellerController::class, 'addbalence'])->name('add');
        });

        Route::get('interface/data', [AuthController::class, 'interfaceData'])->name('interfaceData');


        Route::prefix('pppoe')->name('pppoe.')->group(function () {
            Route::get('/', [PPPoEController::class, 'routerUser'])->name('routerUser');
            Route::get('/suspend', [PPPoEController::class, 'suspendUser'])->name('suspendUser');
            Route::get('/routerUser', [PPPoEController::class, 'index'])->name('index');
            Route::get('/create', [PPPoEController::class, 'create'])->name('create');
            Route::post('/create', [PPPoEController::class, 'store'])->name('create');
            Route::get('/view/{id}', [PPPoEController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [PPPoEController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [PPPoEController::class, 'update'])->name('edit');
            Route::delete('/delete/{id}', [PPPoEController::class, 'destroy'])->name('delete');
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
            Route::get('/pppoe/assign', [SellerController::class, 'pppoeAssign'])->name('pppoeAssign');
            Route::post('/pppoe/assign', [SellerController::class, 'pppoeAssignPost'])->name('pppoeAssign');
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
        Route::get('interface/data', [AuthController::class, 'interfaceData'])->name('interfaceData');


        Route::prefix('pppoe')->name('pppoe.')->group(function () {
            Route::get('/', [PPPoEController::class, 'sellerPPPoeUsers'])->name('routerUser');
            Route::get('/suspend', [PPPoEController::class, 'sellerPPPoeUsersSuspend'])->name('routerUserSuspend');
            Route::get('/create', [PPPoEController::class, 'create'])->name('create');
            Route::post('/create', [PPPoEController::class, 'store'])->name('create');
            Route::get('/view/{id}', [PPPoEController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [PPPoEController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [PPPoEController::class, 'update'])->name('edit');
            Route::post('/active/{id}', [PPPoEController::class, 'active'])->name('active');
            Route::post('/deactive/{id}', [PPPoEController::class, 'deactive'])->name('deactive');
            Route::delete('/delete/{id}', [PPPoEController::class, 'destroy'])->name('delete');
            Route::get('/check', [PPPoEController::class, 'isActiveSeller'])->name('ActiveList');
            Route::post('/check', [PPPoEController::class, 'activeCheckSeller'])->name('activeList');
            Route::post('/check/db', [PPPoEController::class, 'pppoeExistcheckDB'])->name('DbPPPoeCheck');
        });


        Route::prefix('package')->name('package.')->group(function () {
            Route::get('/', [PackagesController::class, 'sellerPackages'])->name('index');
        });
    });
});
