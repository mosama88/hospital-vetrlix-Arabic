<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class single_invoice extends Model
{
    use HasFactory;

    protected $fillable = [
'invoice_date',
'patient_id',
'doctor_id',
'section_id',
'service_id',
'price',
'discount_value',
'tax_rate',
'tax_value',
'total_with_tax',
'type',
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }



}
