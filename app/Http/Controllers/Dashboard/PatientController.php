<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\Dashboard\PatientRequest;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    private $patients;

    public function __construct(PatientRepositoryInterface $patients)
    {
        $this->Patient = $patients;
    }


    public function index()
    {
        return $this->Patient->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Patient->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest  $request)
    {
        return $this->Patient->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Patient->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request)
    {
        return $this->Patient->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Patient->destroy($request);
    }
}
