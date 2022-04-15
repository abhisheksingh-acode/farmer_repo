<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\Farmer\FarmerController;
use App\Http\Controllers\Api\Fcenter\AuthController as FcenterAuthController;
use App\Http\Controllers\Api\Fcenter\FcenterController;
use App\Http\Controllers\Api\NineR\NineRController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\BankDetailController;
use App\Http\Controllers\OrderTableController;
use App\Models\Fcenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|
|
|-----------------------
| User Auth
|-----------------------
|
| register, login, logout
|
*/

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('forget', [AuthController::class, 'forget_get'])->name('forget.get');
Route::post('forget', [AuthController::class, 'forget_post'])->name('forget.post');

//----------------------------------------------
//------------------------------------------
// FACILITATE CENTER API GROUP STARTS

Route::prefix('fcenter')->name('api.fcenter.')->group(function () {

    Route::middleware(['guest:fcapi'])->group(function () {

        Route::controller(FcenterAuthController::class)->group(function () {
            Route::post('login', 'login')->name('login');
            Route::post('register', 'store')->name('register');
            Route::post('forgot', 'forgot')->name('forgot');
        });
    });


    Route::middleware(['auth:sanctum'])->group(function () {

        Route::controller(FcenterController::class)->group(function () {
            Route::post('users', 'get')->name('get');
            Route::put('edit/{id}', 'update')->name('update');
        });


        Route::prefix('farmer')->name('farmer.')->group(function () {

            Route::controller(FarmerController::class)->group(function () {
                Route::post('get', 'get')->name('get');
                Route::post('create', 'create')->name('create');
                Route::post('edit/{id}', 'edit')->name('edit');
                Route::put('edit/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
            });
        });


        Route::prefix('order')->name('order.')->group(function () {

            Route::post('get', [OrderTableController::class, 'get'])->name('get');
            Route::post('create', [OrderTableController::class, 'create'])->name('create');
            Route::post('edit/{id}', [OrderTableController::class, 'edit'])->name('edit');
            Route::put('edit/{id}', [OrderTableController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [OrderTableController::class, 'delete'])->name('delete');
        });


        Route::prefix('9r')->name('9r.')->group(function () {

            Route::controller(NineRController::class)->group(function () {
                Route::post('get', 'get')->name('get');
                Route::post('create', 'create')->name('create');
                Route::post('edit/{id}', 'edit')->name('edit');
                Route::put('edit/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
            });
        });
    });
});

//------- FACILITATE CENTER API GROUP ENDS
//------------------------------------------
//----------------------------------------------



Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('fcenter/user', [FcenterController::class, 'index'])->name('api.fcenter.user');

    // user api
    Route::get('users', [AuthController::class, 'users'])->name('post');
    Route::post('users', [AuthController::class, 'users'])->name('post');
    Route::get('user', [AuthController::class, 'user'])->name('user');
    Route::get('user/{id}', [AuthController::class, 'edit'])->name('edit');
    Route::put('user/{id}', [AuthController::class, 'update'])->name('update');
    Route::delete('user/{id}', [AuthController::class, 'delete'])->name('delete');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


    // kyc api
    Route::get("kyc", [KycController::class, 'get'])->name('kyc.index');
    Route::post("kyc", [KycController::class, 'post'])->name('kyc.post');
    Route::get("kyc/{id}", [KycController::class, 'edit'])->name('kyc.edit');
    Route::post("kyc/{id}", [KycController::class, 'update'])->name('kyc.update');
    Route::delete("kyc/{id}", [KycController::class, 'delete'])->name('kyc.delete');



    // bank details api
    Route::get('bank-detail', [BankDetailController::class, 'index'])->name('bank.index');
    Route::post('bank-detail', [BankDetailController::class, 'post'])->name('bank.post');
    Route::get('bank-detail/{id}', [BankDetailController::class, 'edit'])->name('bank.edit');
    Route::put('bank-detail/{id}', [BankDetailController::class, 'update'])->name('bank.update');
    Route::delete('bank-detail/{id}', [BankDetailController::class, 'delete'])->name('bank.delete');


    //order table api
    Route::get('order', [OrderTableController::class, 'index'])->name('order.index');
    Route::post('order', [OrderTableController::class, 'post'])->name('order.post');
    Route::get('order/{id}', [OrderTableController::class, 'edit'])->name('order.edit');
    Route::post('order/{id}', [OrderTableController::class, 'update'])->name('order.update');
    Route::delete('order/{id}', [OrderTableController::class, 'delete'])->name('order.delete');
});
