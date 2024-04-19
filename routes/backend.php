<?php

use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|   $2y$10$2YUyPz/1nmGGZTfteXWCteClA6R7bh45aQalwBGFctG0jbfjNmjdC


*/





        ##################################### Dashboard User #################################
        Route::get('/dashboard/user', function () {
            return view('dashboard.user.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');
        ##################################### End Dashboard User #################################
        ##################################### Dashboard Admin ################################
        Route::get('/dashboard/admin', function () {
            return view('dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        ##################################### End Dashboard Admin #################################
        Route::middleware(['auth:admin', 'verified'])->name('dashboard.')->group(function(){
        Route::get('dashboard/index',[DashboardController::class,'index'])->name('index');
         ##################################### Start Dashboard sections ################################
            Route::resource('/sections', SectionController::class);
         ##################################### End Dashboard sections ################################
          ##################################### Start Dashboard sections ################################
          Route::resource('/doctors', DoctorController::class);
          ##################################### End Dashboard sections ################################
    });



    require __DIR__.'/auth.php';




