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


    public function getAgeAttribute()
    {
        return now()->diffInYears($this->birth_date);
    }

    public function type_blood() {
        // تحقق مباشرة مما إذا كانت القيمة المعرفة باسم "type_blood" تساوي 1
        if ($this->type_blood == 1) {
            echo "A";
        } elseif ($this->type_blood == 2){
            echo "A+";
        }elseif ($this->type_blood == 3){
                echo "B";
        }elseif ($this->type_blood == 4){
            echo "B+";
        }elseif ($this->type_blood == 5){
            echo "O";
        }elseif ($this->type_blood == 6){
            echo "O+";
        }elseif ($this->type_blood == 7){
            echo "AB";
        }
    }
    }

