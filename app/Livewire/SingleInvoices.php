<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Group;
use App\Models\Patient;
use App\Models\Service;
use App\Models\single_invoice;
use Livewire\Component;

class SingleInvoices extends Component
{

    public $InvoiceSaved,$InvoiceUpdated;
    public $show_table = true;
    public $username;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price,$discount_value = 0 ,$patient_id,$doctor_id,$section_id,$type,$Service_id,$single_invoice_id,$catchError;


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

//    public function print($id)
//    {
//        $single_invoice = Invoice::findorfail($id);
//        return Redirect::route('Print_single_invoices',[
//            'invoice_date' => $single_invoice->invoice_date,
//            'doctor_id' => $single_invoice->Doctor->name,
//            'section_id' => $single_invoice->Section->name,
//            'Service_id' => $single_invoice->Service->name,
//            'type' => $single_invoice->type,
//            'price' => $single_invoice->price,
//            'discount_value' => $single_invoice->discount_value,
//            'tax_rate' => $single_invoice->tax_rate,
//            'total_with_tax' => $single_invoice->total_with_tax,
//        ]);

//}

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;

    }

    public function get_price()
    {
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }
}

