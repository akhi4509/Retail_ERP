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
Route::get('/', function () {
    return view('dashboard');
});

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
Route::resource('stock', 'App\Http\Controllers\StockController');
Route::get('stocks', [StockController::class, 'stock'])->name('stocks');
Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');
Route::get('/stocks/edit-stock', [StockController::class, 'edit_stock'])->name('stocks.edit.stock');
Route::delete('/stocks/{stock}', 'App\Http\Controllers\StockController@destroy')->name('stocks.destroy');

// Sales route //
Route::resource('sales', 'App\Http\Controllers\SaleController');
Route::get('sales', [SaleController::class, 'index'])->name('sales');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');


//Report Route//

Route::get('report', [ReportController::class, 'index'])->name('report');

//Setting Route//

Route::prefix('order')->group(function () {
  Route::get('{id}', 'App\Http\Controllers\SaleController@order')->where('id', '[0-9]+');
  // Route::get('return/{sid}/{id}', 'App\Http\Controllers\SalesController@orderReturn')->where(['sid'=>'[0-9]+', 'id'=> '[0-9]+']);
  // Route::get('return/remove/{sid}/{id}', 'App\Http\Controllers\SalesController@deleteOrderReturn')->where(['sid'=>'[0-9]+', 'id'=> '[0-9]+']);

  // Route::get('clear', 'App\Http\Controllers\SalesController@clearOrder');
  // Route::get('view', 'App\Http\Controllers\SalesController@viewOrder');
   Route::get('remove/{id}', 'App\Http\Controllers\SaleController@deleteOrder')->where('id', '[0-9]+');
  // Route::get('update/{id}/{qty}', 'App\Http\Controllers\SalesController@updateOrder')->where(['id' => '[0-9]+', 'qty' => '^[-+]?[0-9]+']);
   Route::get('get/{id}', 'App\Http\Controllers\SaleController@getStock')->where('id', '[0-9]+');
});

Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
Route::get('/settings/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
