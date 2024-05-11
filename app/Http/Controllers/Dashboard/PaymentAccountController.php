<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Finance\PaymentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\PaymentAccount;

class PaymentAccountController extends Controller
{

    private $payments;


    public function __construct(PaymentRepositoryInterface $payments)
    {
        $this->payments = $payments;
    }


    public function index()
    {
        return $this->payments->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->payments->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request  $request)
    {
        return $this->payments->store($request);
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
        return $this->payments->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->payments->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->payments->destroy($request);
    }


}
