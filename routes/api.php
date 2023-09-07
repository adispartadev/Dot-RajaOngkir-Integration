<?php

use App\Http\Controllers\api\AuthC;
use App\Http\Controllers\api\WilayahC;
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



Route::post('login', [AuthC::class, 'login']);

Route::group(['middleware' => 'AuthApi'], function() {
    Route::get('search/provinces', [WilayahC::class, 'cariProvinsi']);
    Route::get('search/cities', [WilayahC::class, 'cariKota']);
});
