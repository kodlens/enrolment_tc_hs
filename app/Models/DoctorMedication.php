<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorMedication extends Model
{
    use HasFactory;

    protected $table = 'doctor_medications';
    protected $primaryKey = 'doctor_medication_id';

    protected $fillable = [
        'patient_id',
        'patient_diagnose_id',
        'remarks',
        'doctor_id',

    ];


}
