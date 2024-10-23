<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VulnerabilityController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vulnerabilities', [VulnerabilityController::class, 'index']);
Route::get('vulnerabilities/{id}', [VulnerabilityController::class, 'show']);
Route::post('vulnerabilities', [VulnerabilityController::class, 'store']);
Route::put('vulnerabilities/{id}', [VulnerabilityController::class, 'update']);
Route::delete('vulnerabilities/{id}', [VulnerabilityController::class, 'destroy']);