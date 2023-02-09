<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDoctorDiagnose extends Model
{
    use HasFactory;


    protected $table = 'patient_doctor_diagnoses';
    protected $primaryKey = 'patient_doctor_diagnose_id';

    protected $fillable = [
        'patient_admission_id',
        'patient_id',
        'admission_diagnosis',
        'principal_diagnosis',
        'other_diagnosis',
        'principal_operation_procedure',
        'other_principal_operation_procedure',
        'accident_injuries',

        'place_occurence',
        'disposition',
        'result',
        'laboratory_findings',
        'medication_disposition'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id', 'patient_id');
    }

    public function patient_admission(){
        return $this->belongsTo(PatientAdmission::class,'patient_admission_id', 'patient_admission_id');
    }

    
}
