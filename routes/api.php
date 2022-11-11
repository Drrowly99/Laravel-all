<?php

use App\Http\Controllers\AgentController;
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

Route::get('/agent', [AgentController::class, 'index']);
Route::get('/innerjoin', [AgentController::class, 'innerjoin']);
Route::get('/leftjoin', [AgentController::class, 'leftjoin']);
Route::get('/crossjoin', [AgentController::class, 'crossjoin']);
Route::get('/union', [AgentController::class, 'union']);
Route::get('/advjoin', [AgentController::class, 'advjoin']);

Route::get('/to_one', [AgentController::class, 'to_one']);
Route::get('/to_many', [AgentController::class, 'to_many']);

