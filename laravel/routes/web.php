<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrucksController;

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

Route::get('/', [TrucksController::class, 'index'])->name('trucks.index');
Route::get('/trucks/create', [TrucksController::class, 'create'])->name('trucks.create');
Route::get('/trucks/edit', [TrucksController::class, 'edit'])->name('trucks.edit');
