<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

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

// auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// companies
Route::group(['middleware' => ['auth:sanctum']], function() {

    // Super Admin
    Route::get('/companies', [CompanyController::class, 'index']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);
    Route::get('/companies/search/{name}', [CompanyController::class, 'search']);

    // Admin
    Route::get('/companies/{id}', [CompanyController::class, 'show']);
    Route::put('/companies/{id}', [CompanyController::class, 'update']);

});

// users
Route::group(['middleware' => ['auth:sanctum']], function() {

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
