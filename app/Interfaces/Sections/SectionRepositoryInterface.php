<?php
namespace App\Interfaces\Sections;



use App\Http\Requests\Dashboard\SectionRequest;

interface SectionRepositoryInterface
{

    public function index();

    public function store(SectionRequest $request);


    public function edit($id);

    public function update( $request);

    public function destroy( $request);

    public function show( $id);

}
