<?php
namespace App\Interfaces\Services;




use App\Http\Requests\Dashboard\ServiceRequest;

interface ServiceRepositoryInterface
{

    public function index();
    public function store(ServiceRequest $request);

    public function edit($request);
    public function update($request);

    public function destroy( $id);

    public function search(Request $request);

}

