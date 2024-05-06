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

    public function doctorappointments(){                                    //Pivot Table
        return $this->belongsToMany(Appointment::class, 'appointment_doctor');
    }


    public function doctorPhoto(){
        // Check if an image already exists for the specified doctor entity
        $existingImage = $this->image()->exists();

        // If an image already exists, return early without requiring a new photo
        if ($existingImage) {
            return null;
        }
    }

    public function SingleInvoice(){
        return $this->belongsTo(single_invoice::class);
    }

}
