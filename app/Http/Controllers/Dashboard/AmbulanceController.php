<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AmbulanceRequest;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    private $ambulances;

    public function __construct(AmbulanceRepositoryInterface $ambulances)
    {
        $this->ambulances = $ambulances;
    }
    public function index()
    {
        return $this->ambulances->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->ambulances->create();
    }


    public function store(AmbulanceRequest $request)
    {
        return $this->ambulances->store($request);
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
        return $this->ambulances->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmbulanceRequest $request)
    {
        return $this->ambulances->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->ambulances->destroy($request);

    }
}
