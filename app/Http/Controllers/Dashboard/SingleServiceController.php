<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ServiceRequest;
use App\Interfaces\Services\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{


    private $singleService;

    public function __construct(ServiceRepositoryInterface $singleService)
    {
        $this->singleService = $singleService;
    }



    public function index()
    {
        return $this->singleService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        return $this->singleService->store($request);
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
    public function edit(Request $request)
    {
        return $this->singleService->edit($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->singleService->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->singleService->destroy($request);
    }

    public function search(Request $request)
    {
        return $this->singleService->search($request);
    }
}
