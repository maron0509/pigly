<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeightTargetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/weight_logs/search', [WeightLogController::class, 'search']);

Route::get('/weight_logs/goal_setting', [WeightLogController::class, 'goalSettingForm']);
Route::post('/weight_logs/goal_setting', [WeightLogController::class, 'goalSetting']);  
Route::resource('weight_logs', WeightLogController::class);
//Route::get('/weight_logs', [WeightLogController::class, 'index']);
//Route::get('/weight_logs/create', [WeightLogController::class, 'create']);
//Route::post('/weight_logs', [WeightLogController::class, 'store']);

});

//Route::patch('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update']);
//Route::delete('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'destroy']);

//Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'show']);

Route::get('/register/step1', [AuthController::class, 'step1']);
Route::post('/register/step1', [AuthController::class, 'storeStep1']);
Route::get('/register/step2', [WeightTargetController::class, 'step2']);
Route::post('/register/step2', [WeightTargetController::class, 'storeStep2']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::post('/logout', [AuthController::class, 'logout']);
//Route::resource('weight_logs', WeightLogController::class)->except(['show']);