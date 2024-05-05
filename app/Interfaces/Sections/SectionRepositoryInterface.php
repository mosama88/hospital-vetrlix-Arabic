<?php
namespace App\Interfaces\Sections;



use App\Http\Requests\Dashboard\SectionRequest;
use Illuminate\Http\Request;

interface SectionRepositoryInterface
{

    public function index();

    public function store(SectionRequest $request);


    public function edit($id);

    public function update( $request);

    public function destroy( $request);

    public function show( $id);

    public function search(Request $request);
}
