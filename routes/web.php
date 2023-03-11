<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TruckController;
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



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('clients/{id}/cars', [ClientController::class, 'showCars'])->name('clients.cars');
    Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
    Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::post('/clients/{client}/cars', [CarController::class, 'store'])->name('cars.store');
    Route::get('/clients/{client}/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::get('/cars/{car}/trucks',  [TruckController::class, 'index'])->name('cars.trucks');
    Route::get('/trucks/{truck}',[TruckController::class, 'show'] )->name('trucks.show');
    Route::get('/trucks/{truck}/edit',[TruckController::class, 'edit'] )->name('trucks.edit');
    Route::get('/cars/{car}/trucks', [TruckController::class, 'index'])->name('cars.trucks');
    Route::put('/trucks/{truck}', [TruckController::class, 'update'])->name('trucks.update');

    Route::delete('/trucks/{truck}', [TruckController::class, 'destroy'])->name('trucks.destroy');
    Route::get('/trucks', [TruckController::class, 'view'])->name('trucks.view');
    Route::post('/trucks', [TruckController::class, 'store'])->name('trucks.store');
    Route::get('/trucks/{truck}/cars', [TruckController::class, 'showCars'])->name('trucks.cars');
    Route::get('/cars/{car}/clients', [CarController::class, 'showClients'])->name('cars.clients.show');
    Route::get('/camion/search',  [TruckController::class, 'search'])->name('camion.search');
    Route::get('/cam', [TruckController::class, 'create'])->name('cam');



   /*
    Route::get('/trucks/{truck}', [TruckController::class, 'show'])->name('trucks.show');
    Route::get('/trucks/{truck}/edit', [TruckController::class, 'edit'])->name('trucks.edit');
    Route::get('/trucks/{truck}', [TruckController::class, 'show'])->name('trucks.show');
    Route::delete('/trucks/{truck}', [TruckController::class, 'destroy'])->name('trucks.destroy');
    Route::put('/trucks/{truck}', [TruckController::class, 'update'])->name('trucks.update');*/




});


