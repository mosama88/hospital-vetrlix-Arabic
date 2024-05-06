<?php

use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\PatientController;
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
//define('PAGINATION_COUNT', 1);

        ##################################### Route User #################################
        Route::get('/dashboard/user', function () {
            return view('dashboard.user.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');
        ##################################### End Route User #################################
        ##################################### Route Admin ################################
        Route::get('/dashboard/admin', function () {
            return view('dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        ##################################### End Route Admin #################################
        Route::middleware(['auth:admin', 'verified'])->name('dashboard.')->group(function(){
        Route::get('dashboard/index',[DashboardController::class,'index'])->name('index');
            ##################################### Start Route Profile ################################
            Route::view('/Profile', 'profile.profile')->name('my-profile');
            ##################################### End Route Profile ################################

         ##################################### Start Route sections ################################
            Route::resource('/sections', SectionController::class);
            Route::get('sections-search', [SectionController::class,'search'])->name('sections-search');
            ##################################### End Route sections ################################
          ##################################### Start Route sections ################################
          Route::resource('/doctors', DoctorController::class);
          Route::post('/update-password', [DoctorController::class, 'update_password'])->name('update-password');
          Route::post('/update-status', [DoctorController::class, 'update_status'])->name('update-status');
          ##################################### End Route sections ################################
        ##################################### Start Route Services ################################
        Route::resource('/services', SingleServiceController::class);
        Route::get('services-search', [SingleServiceController::class,'search'])->name('services-search');
        ##################################### End Route Services ################################
            ##################################### Start Route Services ################################
            Route::view('/Service/Group', 'livewire.GroupService.includeCreateGroup')->name('add-Service-Group');
            ##################################### End Route Services ################################
            ##################################### Start Route insurances ################################
            Route::resource( '/insurances',InsuranceController::class);
            ##################################### End Route insurances ################################
            ##################################### Start Route Ambulance ################################
            Route::resource( '/ambulances',AmbulanceController::class);
            ##################################### End Route Ambulance ################################
            ##################################### Start Route Patients ################################
            Route::resource( '/patients',PatientController::class);
            ##################################### End Route Patients ################################
            ##################################### Start Route Single Invoices ################################
            Route::view( 'single-invoices','livewire.single_invoices.index')->name('single-invoices');
            ##################################### End Route Single Invoices ################################
    });



    require __DIR__.'/auth.php';




