<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StatesController;
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

Route::apiResource('employees', EmployeeController::class);
Route::get('/employees/cpf/{cpf}', [EmployeeController::class, 'findByCpf'])->name('employees.cpf');
Route::post('/employees/salary', [EmployeeController::class, 'bindSalary'])->name('employees.salary');

Route::get('/states', [StatesController::class, 'index']);
Route::get('/cities', [StatesController::class, 'cities']);


