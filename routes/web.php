<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PlateController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//raggruppo le rotte
Route::middleware(['auth', 'verified'])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {

    //CREATE PLATES
    Route::get("/plates/create", [PlateController::class, "create"])->name("plates.create");
    Route::post("/plates", [PlateController::class, "store"])->name("plates.store");

    //READ PLATES
    Route::get("/plates", [PlateController::class, "index"])->name("plates.index");
    Route::get("/plates/{plate}", [PlateController::class, "show"])->name("plates.show");

    //UPDATE PLATES
    Route::get("/plates/{id}/edit", [PlateController::class, "edit"])->name("plates.edit");
    Route::put('/plates/{id}', [PlateController::class, "update"])->name("plates.update");
    
    //DESTROY PLATES
    Route::delete("/plates/{id}", [PlateController::class, "destroy"])->name("plates.destroy");

    //READ ORDERS
    Route::get("/orders", [OrderController::class, "index"])->name("orders.index");
    Route::get("/orders/{id}", [OrderController::class, "show"])->name("orders.show");
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__.'/auth.php';
