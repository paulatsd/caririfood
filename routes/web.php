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

Route::any('admin/planos/search', [PlanController::class, 'search'])->name('plans.search');
Route::post('admin/planos', [PlanController::class, 'store'])->name('plans.store');
Route::get('admin/planos/create', [PlanController::class, 'create'])->name('plans.create');
Route::get('admin/planos', [PlanController::class, 'index'])->name('plans.index');
Route::get('admin/planos/{url}', [PlanController::class, 'show'])->name('plans.show');
Route::delete('admin/plnanos/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');

Route::get('/', function () {
    return view('welcome');
});
