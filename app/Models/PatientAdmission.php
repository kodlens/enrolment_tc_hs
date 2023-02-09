<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAdmission extends Model
{
    use HasFactory;


    protected $table = 'patient_admissions';
    protected $primaryKey = 'patient_admission_d';

    protected $fillable = [
        'patient_id',
        'admission_date',
        'discharge_date',
        'total_day',
        'ward_room',
        'admitting_physician',
        'admitting_clerk',
        'attending_physician',
        'referred_by',

        'social_service_classification',
        'allergic_to',
        'hospitalization_name',
        'health_inssurance',
        'phic',
        'data_furnished_by',

        'address_informant',
        'patient_relation',
        'admission_diagnosis',
        'bp',
        'cr',
        'rr',
        'temp',
        'disposition',
        'laboratory_findings'

    ];

    public function patient(){
        return $this->hasOne(Patient::class, 'patient_id', 'patient_id');
    }

    public function doctor_diagnose(){
        return $this->hasOne(PatientDoctorDiagnose::class, 'patient_admission_id', 'patient_admission_id');
    }

    public function history(){
        return $this->hasOne(PatientHistory::class, 'patient_admission_id', 'patient_admission_id');
    }

    public function physical_exam(){
        return $this->hasOne(PhysicalExam::class, 'patient_admission_id', 'patient_admission_id');
    }

    public function doctor_orders(){
        return $this->hasMany(DoctorOrder::class, 'patient_admission_id', 'patient_admission_id');
    }

    public function nurse_notes(){
        return $this->hasMany(NurseNote::class, 'patient_admission_id', 'patient_admission_id');
    }

    public function medications(){
        return $this->hasMany(PatientMedication::class, 'patient_admission_id', 'patient_admission_id');
    }




}
