<?php
namespace App\Interfaces\Insurances;

//use App\Http\Requests\Dashboard\InsuranceRequest;



interface InsuranceRepositoryInterface
{

    public function index();
    public function store($request);
    public function create();

    public function edit($id);
    public function update($request);

    public function destroy( $request);



}

