<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected  $fillable =[
'nation_number',
'name',
'email',
'password',
'phone',
'birth_date',
'type_blood',
'gender',
'sick_history',
'address_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
