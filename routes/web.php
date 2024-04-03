<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthenticationController;

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

Route::get('/login', [AuthenticationController::class, 'index'])->name('admin.auth.login');

Route::post('/login', [AuthenticationController::class, 'customLogin'])->name('login');


// Route::get('register', function () {
//     return view('admin.auth.register');
// });
Route::get('/register', [AuthenticationController::class, 'registration'])->name('admin.auth.register');
Route::post('/register', [AuthenticationController::class, 'customRegistration'])->name('registeradd');

// Route::get('dashboard', function () {
//     return view('dashboard');
// });

//Authentication rediration dashboard route

Route::get('dashboard', [AuthenticationController::class , 'dashboard']);

Route::get('reset-email', function () {
    return view('admin.auth.passwords.email');
});

Route::get('reset-password', function () {
    return view('admin.auth.passwords.reset');
});
// Users route //
Route::get('users', [UserController::class, 'index'])->name('users');
Route::get('/users/add', [UserController::class, 'create'])->name('users.add');


// stocks route //
Route::get('stocks', [StockController::class, 'stock'])->name('stocks');
Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');
Route::get('/stocks/edit-stock', [StockController::class, 'edit_stock'])->name('stocks.edit.stock');


// Sales route //
Route::get('sales', [SaleController::class, 'index'])->name('sales');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');


//Report Route//

Route::get('report', [ReportController::class, 'index'])->name('report');

//Setting Route//

// Route::get('settings', [SettingController::class, 'index'])->name('setting');
// Route::get('/settings', 'App\Http\Controllers\SettingController@index');

// Route::post('/settings', 'SettingController@store')->name('setting.store');
// Route::resource('settings', 'SettingController')->only(['index', 'store', 'update']);

Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
Route::get('/settings/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
