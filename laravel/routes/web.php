<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrucksController;
use App\Http\Controllers\SubunitsController;

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

// Trucks routes
Route::get('/', [TrucksController::class, 'index'])->name('trucks.index');
Route::get('/trucks/create', [TrucksController::class, 'create'])->name('trucks.create');
Route::get('/trucks/edit/{id}', [TrucksController::class, 'edit'])->name('trucks.edit');
Route::post('/trucks/create', [TrucksController::class, 'store'])->name('trucks.store');
Route::put('/trucks/edit/{id}', [TrucksController::class, 'update'])->name('trucks.update');
Route::delete('/trucks/delete/{id}', [TrucksController::class, 'destroy'])->name('trucks.destroy');

// Subunits routes
Route::get('/subunits', [SubunitsController::class, 'index'])->name('subunits.index');
Route::get('/subunits/create', [SubunitsController::class, 'create'])->name('subunits.create');
Route::post('/subunits/create', [SubunitsController::class, 'store'])->name('subunits.store');
Route::get('/subunits/edit/{id}', [SubunitsController::class, 'edit'])->name('subunits.edit');
Route::put('/subunits/edit/{id}', [SubunitsController::class, 'update'])->name('subunits.update');

