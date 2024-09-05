<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesmanController;
use App\Models\Salesman;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('test');
});

// Route::get('/dashboardadmin', [AdminController::class, 'getIndex'])->name('dashboardadm');
// Route::get('/barang', [BarangController::class, 'getBarang'])->name('getBarang');
// Route::post('/barang', [BarangController::class, 'addBarang'])->name('addBarang');
// Route::post('/logout', [AdminController::class, 'adminLogout'])->name('adminlogout');
// Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barangdestroy');
// Route::post('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

Route::get('/customer', [CustomerController::class, 'getindexcust'])->name('indexcust');
Route::post('/customer', [CustomerController::class, 'addcust'])->name('addcust');
Route::delete('/customer/{customer_id}', [CustomerController::class, 'destroy'])->name('deletecust');
Route::put('/customer/{customer_id}', [CustomerController::class, 'update'])->name('cust.update');

Route::get('/salesman', [SalesmanController::class, 'salesmanIndex'])->name('indexsalesman');
Route::post('/salesman', [SalesmanController::class, 'addsalesman'])->name('addsalesman');
Route::delete('/salesman/{salesman_id}', [SalesmanController::class, 'destroy'])->name('deletesalesman');
Route::put('/salesman/{salesman_id}', [SalesmanController::class, 'update'])->name('salesman.update');

Route::get('/order', [OrderController::class, 'orderIndex'])->name('indexorder');
Route::post('/order', [OrderController::class, 'createOrder'])->name('createOrder');
Route::delete('/order/{order_id}', [OrderController::class, 'destroy'])->name('deleteorder');
Route::put('/order/{order_id}', [OrderController::class, 'update'])->name('order.update');
