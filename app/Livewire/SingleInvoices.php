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

    public $invoce_saved , $invoce_updated;
    public $show_table = true;

    public $tax_rate = 17;


    public $updateMode;

    public $price,$discount_value = 0 ;

    public $patient_id,$doctor_id,$section_id,$type,$Service_id,$single_invoice_id,$catchError;

    public $subtotal;
    public $Group_id;
    public function render()
    {
        return view('livewire.single_invoices.single-invoices',[

        'single_invoices'=>single_invoice::all(),
            'Patients'=>Patient::all(),
            'Doctors'=>Doctor::all(),
            'Groups'=>Service::all(),
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
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }
}

