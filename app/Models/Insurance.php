<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    protected $fillable =[
'name',
'insurance_code',
'discount_percentage',
'company_rate',
'notes',
'status',
    ];
}
