<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ReportProduct;
use App\Models\Store;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('data', [DataController::class, 'index'])->name('data.index');
Route::get('data', [DataController::class, 'index'])->name('data.index');
Route::get('data/data/{for}/{area}/{date_from}/{date_to}', [DataController::class, 'getData'])->name('data.getData');


Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::resource('/', DataController::class);
// Route::get('/table', [DataController::class, 'table'])->name('table');
// Route::get('/table', [DataController::class, 'table'])->name('table');

// dd(ProductBrand::with('product')->whereId('1')->first());
// dd(Store::with('store_area', 'store_account')->whereId('1')->first());
// dd(ReportProduct::with('store', 'product')->whereId('1')->first());
