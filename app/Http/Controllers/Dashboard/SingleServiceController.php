<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{


    private $singleSerice;

    public function __construct(ServiceRepositoryInterface $singleSerice)
    {
        $this->singleSerice = $singleSerice;
    }



    public function index()
    {
        return $this->singleSerice->index();
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
    public function store(Request $request)
    {
        return $this->singleSerice->store($request);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->singleSerice->destroy($request);
    }
}
