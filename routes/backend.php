<?php

use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SingleServiceController;
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
            ##################################### Start Dashboard Profile ################################
            Route::view('/Profile', 'profile.profile')->name('my-profile');
            ##################################### End Dashboard Profile ################################

         ##################################### Start Dashboard sections ################################
            Route::resource('/sections', SectionController::class);
         ##################################### End Dashboard sections ################################
          ##################################### Start Dashboard sections ################################
          Route::resource('/doctors', DoctorController::class);
          Route::post('/update-password', [DoctorController::class, 'update_password'])->name('update-password');
          Route::post('/update-status', [DoctorController::class, 'update_status'])->name('update-status');
          ##################################### End Dashboard sections ################################
        ##################################### Start Dashboard Services ################################
        Route::resource('/services', SingleServiceController::class);
        ##################################### End Dashboard Services ################################
            ##################################### Start Dashboard Services ################################
            Route::view('/Service/Group', 'livewire.GroupService.includeCreateGroup')->name('add-Service-Group');
            ##################################### End Dashboard Services ################################
            ##################################### Start Dashboard insurances ################################
            Route::resource( '/insurances',InsuranceController::class);
            ##################################### End Dashboard insurances ################################
            ##################################### Start Dashboard Ambulance ################################
            Route::resource( '/ambulances',AmbulanceController::class);
            ##################################### End Dashboard Ambulance ################################
    });



    require __DIR__.'/auth.php';




