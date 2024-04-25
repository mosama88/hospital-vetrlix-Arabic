<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable =[
            'name',
            'notes',
            'total_before_discount',
            'discount_value',
            'total_after_discount',
            'tax_rate',
            'total_with_tax',
    ];
}
