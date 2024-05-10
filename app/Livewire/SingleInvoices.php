<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Group;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Section;
use App\Models\Service;
use App\Models\single_invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class SingleInvoices extends Component
{
    public $InvoiceSaved,$InvoiceUpdated;
    public $show_table = true;
    public $username;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price,$discount_value = 0 ,$patient_id,$doctor_id,$section_id,$type,$Service_id,$single_invoice_id,$catchError;

    public function mount(){

        $this->username = auth()->user()->name;
    }

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

    public function print($id)
    {
        $single_invoice = single_invoice::findorfail($id);
        return Redirect::route('Print_single_invoices',[
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->name,
            'section_id' => $single_invoice->Section->name,
            'Service_id' => $single_invoice->Service->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);

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



    public function edit($id){

        $this->show_table = false;
        $this->updateMode = true;
        $single_invoice = single_invoice::findorfail($id);
        $this->single_invoice_id = $single_invoice->id;
        $this->patient_id = $single_invoice->patient_id;
        $this->doctor_id = $single_invoice->doctor_id;
        $section = DB::table('sections')->where('name', $this->section_id)->first();
        if ($section) {
            $this->section_id = $section->id;
        } else {
            // Handle the case when the section doesn't exist
        }
        $this->Service_id = $single_invoice->Service_id;
        $this->price = $single_invoice->price;
        $this->discount_value = $single_invoice->discount_value;
        $this->type = $single_invoice->type;


    }

    public function store(){
        //فى حالة كانت الفاتورة نقدى
        if($this->type == 1){
            // في حالة التعديل
            if($this->updateMode){
                $single_invoices = single_invoice::findorfail($this->single_invoice_id);
                $single_invoices->type = 1;
                $single_invoices->invoice_date = date('Y-m-d');
                $single_invoices->patient_id = $this->patient_id;
                $single_invoices->doctor_id = $this->doctor_id;
                $section = DB::table('sections')->where('name', $this->section_id)->first();
                if ($section) {
                    $single_invoices->section_id = $section->id;
                } else {
                    // Handle the case when the section doesn't exist
                }
                $single_invoices->Service_id = $this->Service_id;
                $single_invoices->price = $this->price;
                $single_invoices->discount_value = $this->discount_value;
                $single_invoices->tax_rate = $this->tax_rate;
                // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                $single_invoices->type = $this->type;
                $single_invoices->save();

                $fund_accounts = FundAccount::where('single_invoice_id',$this->single_invoice_id)->first();
                $fund_accounts->date = date('Y-m-d');
                $fund_accounts->single_invoice_id = $single_invoices->id;
                $fund_accounts->Debit = $single_invoices->total_with_tax;
                $fund_accounts->credit = 0.00;
                $fund_accounts->save();
                $this->InvoiceUpdated =true;
                $this->show_table =true;
            }
            // في حالة الاضافة
            else{

//حفظ فى جدول الفواتير
                $single_invoices = new single_invoice();
                $single_invoices->invoice_date = date('Y-m-d');
                $single_invoices->patient_id = $this->patient_id;
                $single_invoices->doctor_id = $this->doctor_id;
                $section = DB::table('sections')->where('name', $this->section_id)->first();
                if ($section) {
                    $single_invoices->section_id = $section->id;
                } else {
                    // Handle the case when the section doesn't exist
                }
                $single_invoices->Service_id = $this->Service_id;
                $single_invoices->price = $this->price;
                $single_invoices->discount_value = $this->discount_value;
                $single_invoices->tax_rate = $this->tax_rate;
                // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                $single_invoices->type = $this->type;
                $single_invoices->save();

                //حفظ فى جدول الصندوق
                $fund_accounts = new FundAccount();
                $fund_accounts->date = date('Y-m-d');
                $fund_accounts->single_invoice_id = $single_invoices->id;
                $fund_accounts->Debit = $single_invoices->total_with_tax;
                $fund_accounts->credit = 0.00;
                $fund_accounts->save();


                $this->InvoiceUpdated =true;
                $this->show_table =true;
            }
        }else{

            $single_invoices = new single_invoice();
            $single_invoices->invoice_date = date('Y-m-d');
            $single_invoices->patient_id = $this->patient_id;
            $single_invoices->doctor_id = $this->doctor_id;
            $section = DB::table('sections')->where('name', $this->section_id)->first();
            if ($section) {
                $single_invoices->section_id = $section->id;
            } else {
                // Handle the case when the section doesn't exist
            }
            $single_invoices->Service_id = $this->Service_id;
            $single_invoices->price = $this->price;
            $single_invoices->discount_value = $this->discount_value;
            $single_invoices->tax_rate = $this->tax_rate;
            // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
            $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
            // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
            $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
            $single_invoices->type = $this->type;
            $single_invoices->save();

            //حفظ فى جدول حسابات المريض
            $patient_accounts = new PatientAccount();
            $patient_accounts->date = date('Y-m-d');
            $patient_accounts->single_invoice_id = $single_invoices->id;
            $patient_accounts->patient_id = $single_invoices->patient_id;
            $patient_accounts->Debit = $single_invoices->total_with_tax;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();
            $this->InvoiceUpdated =true;
            $this->show_table =true;
        }
    }

    public function delete($id){

        $this->single_invoice_id = $id;

    }

    public function destroy(){
        single_invoice::destroy($this->single_invoice_id);
        return redirect()->to('single-invoices');
    }
}





