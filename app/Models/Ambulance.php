<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;
    protected  $fillable =[
'name',
'car_number',
'car_model',
'car_year_model',
'license_number',
'phone',
'available',
'type',
'notes',
    ];
}
