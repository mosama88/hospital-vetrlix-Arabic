<?php


namespace App\Interfaces\Finance;


interface PaymentRepositoryInterface
{
    // get All receipts
    public function index();

    // show form add
    public function create();

    // store receipts
    public function store($request);

    // edit receipts
    public function edit($id);

    // show receipts
    public function show($id);

    // Update receipts
    public function update($request);

    // destroy receipts
    public function destroy($request);
}
