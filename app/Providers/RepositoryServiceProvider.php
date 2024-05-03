<?php

namespace App\Providers;

use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\Insurances\InsuranceRepository;
use App\Repository\Patients\PatientRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Services\ServiceRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Interfaces\Services\ServiceRepositoryInterface;
use App\Interfaces\Sections\SectionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
