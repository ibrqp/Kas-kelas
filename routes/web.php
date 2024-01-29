<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController ;
use App\Http\Controllers\PembayaranController;


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
    return view('welcome');
});

Route::get('/siswa', [MemberController::class, 'index']);
Route::get('/get-members', [MemberController::class, 'getMembers']);
Route::post('/save', [MemberController::class, 'save']);

Route::patch('/update/{id}', [MemberController::class, 'update'])->name('member.update');
Route::delete('/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');


Route::get('pembayaran/{id}/detail', [PembayaranController::class, 'detail'])->name('pembayaran.detail');
Route::resource('pembayaran', PembayaranController::class);
Route::get('/pembayarans/detail/{siswaId}', [PembayaranController::class, 'getDetail']);
Route::get('/get-siswa-detail/{siswaId}', [PembayaranController::class, 'getSiswaDetail']);