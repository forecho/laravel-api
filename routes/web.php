<?php

use App\Http\Controllers\ApiDocumentController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SwaggerAssetController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/api/health-check', [HealthController::class, 'index']);
Route::get('/api/documentation', [ApiDocumentController::class, 'index']);
Route::get('/api/docs', [ApiDocumentController::class, 'docs'])->name('api.docs');
Route::get('/asset/{asset}', [SwaggerAssetController::class, 'index'])->name('swagger.asset');
