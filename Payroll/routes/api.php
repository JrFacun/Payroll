<?php

use App\Http\Controllers\management\EmployementController;
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

Route::get('/management/employee',[EmployementController::class,'getData']);

Route::post('/management/employee',[EmployementController::class,'addEmployee']);

Route::get('/management/employee/{id}',[EmployementController::class,'getEmployeeById']);

Route::put('/management/employee/{id}',[EmployementController::class,'updateEmployee']);

Route::delete('/management/employee/{id}',[EmployementController::class,'deleteEmployee']);

