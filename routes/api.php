<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.v1.')->prefix('v1')->namespace('API\V1')->group(function () {
    // Route::middleware(['auth:api'])->group(function () {
        Route::name('package.')->prefix('package')->namespace('Package')->group(function () {
            Route::get('/', ListPackageController::class)->name('list');
            Route::get('/{id}', DetailPackageController::class)->name('detail');
            Route::delete('/{id}', DeletePackageController::class)->name('delete');
            Route::post('/', CreatePackageController::class)->name('create');
        });
    // });
});