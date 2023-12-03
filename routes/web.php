<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Barang_masukController;
use App\Http\Controllers\Barang_keluarController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\Stok_barangController;
use App\Http\Controllers\SupplierController;
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


Route::get('/', [pageController::class, 'login'])->name('login');
Route::get('/login', [pageController::class, 'login'])->name('login');
Route::post('/login', [pageController::class, 'loginProses']);
Route::get('/logout', [pageController::class, 'logout'])->name('logout');
Route::get('/register', [pageController::class, 'register']);


Route::middleware(['auth:pegawai'])->group(function () {

Route::get('/admin', [adminController::class, 'index']);
Route::get('/admin/manageuser', [adminController::class, 'manageUser'])->name('manageuser');
Route::get('/admin/manageuser/adduser', [adminController::class, 'adduser']);
Route::post('/admin/manageuser/storeuser', [adminController::class, 'storeuser']);
Route::get('/admin/manageuser/deleteid={id}', [adminController::class, 'deleteuser']);
Route::get('/admin/manageuser/pegawaiid={id}', [adminController::class, 'editUser']);
Route::post('/admin/manageuser/updateuser={id}', [adminController::class, 'updateuser']);

Route::get('/admin/managetrash', [adminController::class, 'manageTrash']);
Route::get('/admin/restoreall', [adminController::class, 'restoreall']);
Route::get('/admin/manageuser/restore/pegawaiid={id}', [adminController::class, 'restoreUser']);
Route::get('/admin/forcedelete={id}', [adminController::class, 'forcedelete']);

Route::get('/admin/account', [adminController::class, 'account']);
Route::post('/admin/account', [adminController::class, 'Storeaccount']);

Route::get('/admin/listitem', [BarangController::class, 'index'])->name('listitem');
Route::get('/admin/listitem/data', [BarangController::class, 'getdata']);
Route::get('/admin/listitem/addNewItem', [BarangController::class, 'addItem']);
Route::post('/admin/listitem/storeNewItem', [BarangController::class, 'storeItem']);
Route::get('/admin/listitem/barangid={id}', [BarangController::class, 'editItem']);
Route::post('/admin/listitem/updateNewItem={id}', [BarangController::class, 'updateItem']);
Route::get('/admin/listitem/deleteid={id}', [BarangController::class, 'deleteItem']);

Route::get('/admin/listsupplier', [SupplierController::class, 'index'])->name('listsupplier');
Route::get('/admin/listsupplier/addNew', [SupplierController::class, 'addSupplier']);
Route::POST('/admin/listsupplier/storeNew', [SupplierController::class, 'storeSupplier']);
Route::get('/admin/listsupplier/editsupplierid={id}', [SupplierController::class, 'editSupplier']);
Route::POST('/admin/listsupplier/updatesupplier={id}', [SupplierController::class, 'updateSupplier']);
Route::get('/admin/listsupplier/supplierid={id}', [SupplierController::class, 'destroySupplier']);
Route::get('/admin/listsupplier/cetakalldata', [SupplierController::class, 'cetakAllData']);

Route::get('/admin/incomeitems', [Barang_masukController::class, 'index'])->name('incomeitems');
Route::get('/admin/incomeitems/add', [Barang_masukController::class, 'create']);
Route::post('/admin/incomeitems/store', [Barang_masukController::class, 'store']);
Route::get('/admin/incomeitems/deleteid={id}', [Barang_masukController::class, 'destroy']);
Route::get('/admin/incomeitems/cetakalldata',[Barang_masukController::class, 'cetakAll']);
Route::post('/admin/incomeitems/customCetak',[Barang_masukController::class, 'customCetak']);

Route::get('/admin/solditems', [Barang_keluarController::class, 'index'])->name('solditems');
Route::get('/admin/solditems/add', [Barang_keluarController::class, 'create']);
Route::post('/admin/solditems/store', [Barang_keluarController::class, 'store']);
Route::get('/admin/solditems/deleteid={id}', [Barang_keluarController::class, 'destroy']);
Route::get('/admin/solditems/cetakalldata',[Barang_keluarController::class, 'cetakAll']);
Route::post('/admin/solditems/customCetak',[Barang_keluarController::class, 'customCetak']);

Route::get('/admin/stokitem/', [Stok_barangController::class, 'index'])->name('stokitem');
Route::get('/admin/stokitem/stokid={id}', [Stok_barangController::class, 'show']);
Route::get('/admin/stokitem/cetakalldata',[Stok_barangController::class, 'cetakAll']);
Route::get('/admin/stokitem/cetak={id}',[Stok_barangController::class, 'cetakDetailAll']);
Route::post('/admin/stokitem/cetak={id}',[Stok_barangController::class, 'cetakDetailAll']);


});
