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


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($company) {
            $lastCompany = static::orderBy('id', 'desc')->first();

            // Set the starting code if no companies exist yet
            $code = ($lastCompany) ? $lastCompany->id + 1 : 1001;

            $company->insurance_code = 'COMP' . $code;
        });
    }

}
