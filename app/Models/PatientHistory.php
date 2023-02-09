<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{
    use HasFactory;

    protected $table = 'patient_histories';
    protected $primaryKey = 'patient_history_id';

    protected $fillable = [
        'patient_id',
        'patient_admission_id',
        'general_data',
        'present_complain',
        'past_history',
        'family_history',
        'occupation_environment',
        'alcohol',
        'tobacco',
        'drug_allergies',
        'other_allergies',
    ];


}
