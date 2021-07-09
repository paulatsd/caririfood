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
    DetailPlanController,
    PlanController
};

Route::prefix('admin')->group(function(){

    /**
     * Routes Details Plans
     */
    Route::post('planos/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('planos/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::get('planos/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');

    /**
     * Routes Plans
     */
    Route::put('planos/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('planos/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('planos/search', [PlanController::class, 'search'])->name('plans.search');
    Route::post('planos', [PlanController::class, 'store'])->name('plans.store');
    Route::get('planos/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('planos', [PlanController::class, 'index'])->name('plans.index');
    Route::get('planos/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('planos/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');

    /**
     * Routes Dashboard
     */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});
