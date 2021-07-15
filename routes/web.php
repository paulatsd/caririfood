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
    PermissionController,
    PlanController,
    ProfileController
};
use App\Http\Controllers\Admin\ACL\PermissionProfileController;

Route::prefix('admin')->group(function(){


    /**
     * Profile x Permissions
     */
    Route::get('profile/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profile.permissions');
    
    /**
     * Routes Profiles
     */
    
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions', PermissionController::class);
    
    /**
     * Routes Profiles
     */
    
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles', ProfileController::class);
   

    /**
     * Routes Details Plans
     */

    Route::put('planos/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('planos/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::post('planos/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('planos/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::get('planos/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
    Route::delete('planos/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
    Route::get('planos/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');

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
