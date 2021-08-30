<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::prefix('user')->group(function () {

    Route::get(
        '/',
        [
            UserController::class,
            'index'
        ]
    )->name('api.user');

    Route::get(
        '/{id}/show',
        [
            UserController::class,
            'show'
        ]
    )->name('api.user.show');

    Route::post(
        'store',
        [
            UserController::class,
            'store'
        ]
    )->name('api.user.store');

    Route::put(
        '/update',
        [
            UserController::class,
            'update'
        ]
    )->name('api.user.update');

    Route::delete(
        '/delete',
        [
            UserController::class,
            'destroy'
        ]
    )->name('api.user.delete');

    Route::prefix('by')->group(function() {

        Route::get(
            'city',
            [
                CityController::class,
                'countUsers'
            ]
        )->name('api.user.by.city');

        Route::get(
            'state',
            [
                StateController::class,
                'countUsers'
            ]
        )->name('api.user.by.state');

    });

});

Route::prefix('address')->group(function() {

    Route::get(
        '',
        [
            AddressController::class,
            'index'
        ]
    )->name('api.address');

    Route::get(
        '/{id}/show',
        [
            AddressController::class,
            'show'
        ]
    )->name('api.address.show');

});

Route::prefix('city')->group(function() {

    Route::get(
        '',
        [
            CityController::class,
            'index'
        ]
    )->name('api.address');

    Route::get(
        '/{id}/show',
        [
            CityController::class,
            'show'
        ]
    )->name('api.address.show');

});

Route::prefix('state')->group(function() {

    Route::get(
        '',
        [
            StateController::class,
            'index'
        ]
    )->name('api.address');

    Route::get(
        '/{id}/show',
        [
            StateController::class,
            'show'
        ]
    )->name('api.address.show');

});
