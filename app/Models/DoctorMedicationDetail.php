<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorMedicationDetail extends Model
{
    use HasFactory;

    protected $table = 'doctor_medication_details';
    protected $primaryKey = 'doctor_medication_detail_id';

    protected $fillable = [
        'doctor_medication_id',
        'name_of_drugs',
        'instruction',
    ];

}
