<?php

use App\Http\Controllers\LayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
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

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/layanans', [LayananController::class, 'index']);
Route::get('/layanans/{id}', [LayananController::class, 'show']);
Route::get('/layanans/search/{name}', [LayananController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/layanans', [LayananController::class, 'store']);
    Route::put('/layanans/{id}', [LayananController::class, 'update']);
    Route::delete('/layanans/{id}', [LayananController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/order', [OrderController::class, 'orderLayanan']);
    Route::get('/order', [OrderController::class, 'getOrder']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
