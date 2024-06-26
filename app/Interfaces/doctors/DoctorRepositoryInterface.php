<?php
namespace App\Interfaces\Doctors;

use App\Http\Requests\Dashboard\DoctorRequest;



interface DoctorRepositoryInterface
{

    public function index();
    public function store(DoctorRequest $request);
    public function create();

    public function edit($id);
    public function update(DoctorRequest $request);

    public function destroy( $request);

    public function update_password( $request);

    public function update_status( $request);

}

