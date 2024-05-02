<?php
namespace App\Interfaces\Insurances;

//use App\Http\Requests\Dashboard\InsuranceRequest;


use App\Http\Requests\Dashboard\InsuranceRequest;

interface InsuranceRepositoryInterface
{

    public function index();
    public function store(InsuranceRequest  $request);
    public function create();

    public function edit($id);
    public function update(InsuranceRequest $request);

    public function destroy( $request);



}

