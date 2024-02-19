<?php

use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/assets', AssetController::class);
Route::put('/assets/{asset}/assign', [AssetController::class, 'assign'])->name('asset.assign');
Route::put('/assets/{asset}/deassign', [AssetController::class, 'deassign'])->name('asset.deassign');
Route::put('/assets/{asset}/restore', [AssetController::class, 'restore'])->name('asset.restore');
