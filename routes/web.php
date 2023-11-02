<?php

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

    //CREATE
    Route::get("/plates/create", [PlateController::class, "create"])->name("plates.create");
    Route::post("/plates", [PlateController::class, "store"])->name("plates.store");

    //READ
    Route::get("/plates", [PlateController::class, "index"])->name("plates.index");
    Route::get("/plates/{plate}", [PlateController::class, "show"])->name("plates.show");

    //UPDATE
    Route::get("/plates/{id}/edit", [PlateController::class, "edit"])->name("plates.edit");
    Route::put('/plates/{id}', [PlateController::class, "update"])->name("plates.update");
    
    //DESTROY
    Route::delete("/plates/{id}", [PlateController::class, "destroy"])->name("plates.destroy");
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__.'/auth.php';
