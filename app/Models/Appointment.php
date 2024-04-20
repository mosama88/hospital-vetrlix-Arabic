<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    public function doctor(){
        return $this->hasMany(Doctor::class);
    }

}
