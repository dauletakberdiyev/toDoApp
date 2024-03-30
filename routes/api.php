<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatusController;
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

Route::prefix('task')->name('task-')->group(function () {
    Route::get('', [TaskController::class, 'index'])->name('index');
    Route::post('', [TaskController::class, 'create'])->name('create');
    Route::put('{task}', [TaskController::class, 'update'])->name('update');
    Route::delete('{task}', [TaskController::class, 'delete'])->name('delete');
});

Route::prefix('status')->name('status-')->group(function () {
    Route::get('', [StatusController::class, 'index'])->name('index');
    Route::post('', [StatusController::class, 'create'])->name('create');
    Route::put('{task}', [StatusController::class, 'update'])->name('update');
    Route::delete('{task}', [StatusController::class, 'delete'])->name('delete');
});
