<?php

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
use App\Http\Controllers\Admin\{
    PlanController
};

Route::prefix('admin')->group(function(){

    Route::put('planos/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('planos/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('planos/search', [PlanController::class, 'search'])->name('plans.search');
    Route::post('planos', [PlanController::class, 'store'])->name('plans.store');
    Route::get('planos/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('planos', [PlanController::class, 'index'])->name('plans.index');
    Route::get('planos/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('planos/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');

    Route::get('/', [PlanController::class, 'index'])->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});
