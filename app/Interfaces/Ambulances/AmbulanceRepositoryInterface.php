<?php
namespace App\Interfaces\Ambulances;

use App\Http\Requests\Dashboard\AmbulanceRequest;



interface AmbulanceRepositoryInterface
{
    public function index();
    public function store(AmbulanceRequest $request);
    public function create();

    public function edit($id);
    public function update($request);

    public function destroy( $request);

}

