<?php
namespace App\Interfaces\Doctors;




interface ServiceRepositoryInterface
{

    public function index();
    public function store($request);

    public function edit($id);
    public function update($request);

    public function destroy( $request);

}

