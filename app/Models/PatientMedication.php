<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedication extends Model
{
    use HasFactory;

    protected $table = 'patient_medications';
    protected $primaryKey = 'patient_medication_id';

    protected $fillable = [
        'patient_id',
        'patient_admission_id',
        'doctor_order',
        'datetime_created',
        'medication',
        'remarks',
    ];
}
