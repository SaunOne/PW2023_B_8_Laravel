<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/login',[App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('/test/{id}',[App\Http\Controllers\Api\UserController::class,'tempCreate']);
Route::get('/verify/{verify_key}',[App\Http\Controllers\Api\AuthController::class,'verify']);

Route::middleware('auth:api')->group(function(){
    //user
    Route::get('/users',[App\Http\Controllers\Api\UserController::class,'showAll']);
    Route::post('/users/update',[App\Http\Controllers\Api\UserController::class,'updateProfile']);
    Route::post('/usersUpdate/{id}',[App\Http\Controllers\Api\UserController::class,'updateUser']);
    Route::get('/users/{id}',[App\Http\Controllers\Api\UserController::class,'showById']);
    Route::get('/userLogin',[App\Http\Controllers\Api\UserController::class,'showByLogin']);

    Route::delete('/users/{id}',[App\Http\Controllers\Api\UserController::class,'destroy']);
    //item
    Route::get('/item',[App\Http\Controllers\Api\ItemController::class,'showAll']);
    Route::get('/item/{id}',[App\Http\Controllers\Api\ItemController::class,'showById']);
    Route::post('/item',[App\Http\Controllers\Api\ItemController::class,'store']);
    Route::put('/item/$id',[App\Http\Controllers\Api\ItemController::class,'update']);
    Route::delete('/item/{id}',[App\Http\Controllers\Api\ItemController::class,'destroy']);

    //layanan
    Route::get('/layanan',[App\Http\Controllers\Api\LayananController::class,'showAll']);
    Route::get('/layanan/{id}',[App\Http\Controllers\Api\LayananController::class,'showById']);
    Route::post('/layanan',[App\Http\Controllers\Api\LayananController::class,'store']);
    Route::put('/layanan/{id}',[App\Http\Controllers\Api\LayananController::class,'update']);
    Route::delete('/layanaan/{id}',[App\Http\Controllers\Api\LayananController::class,'destroy']);

    //jenisPengambilan
    Route::get('/jenisPengambilan',[App\Http\Controllers\Api\JenisPengambilanController::class,'showAll']);
    Route::get('/jenisPengambilan/{id}',[App\Http\Controllers\Api\JenisPengambilanController::class,'showById']);
    Route::post('/jenisPengambilan',[App\Http\Controllers\Api\JenisPengambilanController::class,'store']);
    Route::put('/jenisPengambilan/{id}',[App\Http\Controllers\Api\JenisPengambilanController::class,'update']);
    Route::delete('/jenisPengambilan/{id}',[App\Http\Controllers\Api\JenisPengambilanController::class,'destroy']);

    //deposit
    Route::get('/deposit',[App\Http\Controllers\Api\TransaksiWalletController::class,'showAll']);
    Route::get('/deposit/{id}',[App\Http\Controllers\Api\TransaksiWalletController::class,'showById']);
    Route::get('/deposit/user/{id}',[App\Http\Controllers\Api\TransaksiWalletController::class,'showByIdUser']);
    Route::post('/deposit',[App\Http\Controllers\Api\TransaksiWalletController::class,'deposit']);
    Route::post('/pembayaran',[App\Http\Controllers\Api\TransaksiWalletController::class,'pembayaran']);
    
    //transaksiLaundry
    Route::get('/transaksiLaundry',[App\Http\Controllers\Api\TransaksiLaundryController::class,'showAll']);
    Route::get('/transaksiLaundry/{id}',[App\Http\Controllers\Api\TransaksiLaundryController::class,'showById']);
    Route::get('/transaksiLaundryByUser',[App\Http\Controllers\Api\TransaksiLaundryController::class,'showByIdUser']);
    Route::post('/transaksiLaundry',[App\Http\Controllers\Api\TransaksiLaundryController::class,'order']);
 
    Route::put('/transaksiLaundry/harga/{id}',[App\Http\Controllers\Api\TransaksiLaundryController::class,'updateTotalHarga']);
    Route::put('/transaksiLaundry/{id}',[App\Http\Controllers\Api\TransaksiLaundryController::class,'update']);
    Route::delete('/transaksiLaundry/{id}',[App\Http\Controllers\Api\TransaksiLaundryController::class,'destroy']);
    Route::put('/transaksiLaundry/bayar/{id}',[App\Http\Controllers\Api\TransaksiLaundryController::class,'bayar']);

    //TransaksiTambahan
    Route::get('/transaksiTambahan/transaksi/{id}',[App\Http\Controllers\Api\TransaksiTambahanController::class,'showByIdTransaksi']);
    Route::get('/transaksiTambahan/{id}',[App\Http\Controllers\Api\TransaksiTambahanController::class,'showByIdTransaksi']);
    Route::post('/transaksiTambahan',[App\Http\Controllers\Api\TransaksiTambahanController::class,'tambahItem']);
    Route::put('/transaksiTambahan/{id}',[App\Http\Controllers\Api\TransaksiTambahanController::class,'update']);
    Route::delete('/transaksiTambahan/{id}',[App\Http\Controllers\Api\TransaksiTambahanController::class,'destroy']);
}); 

