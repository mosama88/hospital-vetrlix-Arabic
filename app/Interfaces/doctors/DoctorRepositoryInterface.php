<?php
namespace App\Interfaces\Doctors;

use App\Http\Requests\Dashboard\DoctorRequest;



interface DoctorRepositoryInterface
{

    public function index();
    public function store($request);
    public function create();

    public function edit($id);
    public function update( $request);

    public function destroy( $request);

}