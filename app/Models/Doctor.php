<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;


    protected $fillable = [
    'name',
    'email',
    'email_verified_at',
    'password',
    'phone',
    'section_id',
    'appointment_id',
];

//protected $guared=[];


/**
     * Get the Doctor's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function doctorappointments(){
        return $this->belongsToMany(Appointment::class, 'appointment_doctor');
    }

}
