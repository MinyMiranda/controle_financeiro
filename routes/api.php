<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    // Manipulação de usuário
    Route::group(['prefix' => 'users'], function () {
        Route::post('/store', [UserController::class, 'store']);
        Route::get('balance/{cpf}', [UserController::class, 'balance']);
        Route::get('historic/{cpf}', [UserController::class, 'historic']);
    });

    // Manipulação da conta
    Route::group(['prefix' => 'account'], function () {
        Route::post('/debit', [UserController::class, 'debit']);
        Route::post('/credit', [UserController::class, 'credit']);
        Route::post('/transfer', [UserController::class, 'transfer']);
    });
});
