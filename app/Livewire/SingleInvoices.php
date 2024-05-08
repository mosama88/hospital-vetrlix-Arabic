<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Group;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use App\Models\single_invoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SingleInvoices extends Component
{

    public $InvoiceSaved,$InvoiceUpdated;
    public $show_table = true;
    public $username;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price,$discount_value = 0 ,$patient_id,$doctor_id,$section_id,$type,$service_id,$single_invoice_id,$catchError;


    public function render()
    {
        return view('livewire.single_invoices.single-invoices',[

            'single_invoices'=>single_invoice::get(),
            'Patients'=> Patient::all(),
            'Doctors'=> Doctor::all(),
            'Services'=> Service::all(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value'=> $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100)
        ]);
    }

    public function show_form_add(){
        $this->show_table = false;
    }


    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;

    }

    public function get_price()
    {
        $this->price = Service::where('id', $this->service_id)->first()->price;
    }


    public function store(){
        DB::beginTransaction();
        try {
                    $single_invoices = new single_invoice();
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = $this->section_id;
                    $single_invoices->service_id = $this->service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();
                    $this->InvoiceUpdated =true;
                    $this->show_table =true;











                DB::commit();
            }
        catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }
 }

}

