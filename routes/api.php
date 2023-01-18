<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\PositionController;

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

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'admin','middleware' => ['auth','role:admin']], function () {
    Route::post('trainer', [TrainerController::class, 'create']);
    Route::get('trainer', [TrainerController::class, 'index']);
    Route::put('trainer/{id}', [TrainerController::class, 'update']);
    Route::get('trainer/{id}', [TrainerController::class, 'show']);
    Route::delete('trainer/{id}', [TrainerController::class, 'destroy']);

    Route::post('sport', [SportController::class, 'create']);
    Route::get('sport', [SportController::class, 'index']);
    Route::put('sport/{id}', [SportController::class, 'update']);
    Route::get('sport/{id}', [SportController::class, 'show']);
    Route::delete('sport/{id}', [SportController::class, 'destroy']);

    Route::post('position', [PositionController::class, 'create']);
    Route::get('position', [PositionController::class, 'index']);
    Route::put('position/{id}', [PositionController::class, 'update']);
    Route::get('position/{id}', [PositionController::class, 'show']);
    Route::delete('position/{id}', [PositionController::class, 'destroy']);

    Route::post('team', [TeamController::class, 'create']);
    Route::get('team', [TeamController::class, 'index']);
    Route::put('team/{id}', [TeamController::class, 'update']);
    Route::get('team/{id}', [TeamController::class, 'show']);
    Route::delete('team/{id}', [TeamController::class, 'destroy']);

    Route::post('player', [PlayerController::class, 'create']);
    Route::get('player', [PlayerController::class, 'index']);
    Route::put('player/{id}', [PlayerController::class, 'update']);
    Route::get('player/{id}', [PlayerController::class, 'show']);
    Route::delete('player/{id}', [PlayerController::class, 'destroy']);
});

Route::group(['prefix' => 'trainer','middleware' => ['auth','role:trainer']], function () {
    Route::post('player', [PlayerController::class, 'create']);
    Route::get('player', [PlayerController::class, 'index']);
    Route::put('player/{id}', [PlayerController::class, 'update']);
    Route::get('player/{id}', [PlayerController::class, 'show']);
    Route::delete('player/{id}', [PlayerController::class, 'destroy']);

    Route::post('team', [TeamController::class, 'create']);
    Route::get('team', [TeamController::class, 'index']);
    Route::put('team/{id}', [TeamController::class, 'update']);
    Route::get('team/{id}', [TeamController::class, 'show']);
    Route::delete('team/{id}', [TeamController::class, 'destroy']);
});







