<?php
namespace App\Interfaces\Patients;

use App\Http\Requests\Dashboard\PatientRequest;



interface PatientRepositoryInterface
{

    public function index();
    public function store(PatientRequest $request);
    public function create();

    public function edit($id);
    public function update($request);

    public function destroy($request);



}

