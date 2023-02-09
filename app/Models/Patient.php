<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;



    
    protected $table = 'patients';
    protected $primaryKey = 'patient_id';

    protected $fillable = [
      'admission_type',
      'lname',
      'fname',
      'mname',
      'suffix',
      'ward_room',
      'per_address',

      'contact_no',
      'sex',
      'civil_status',
      'bdate',
      'age',
      'birthplace',

      'nationality',
      'religion',
      'occupation',

      'employer',
      'employer_address',
      'employer_contact_no',

      'father_name',
      'father_address',
      'father_contact_no',

      'mother_maiden_name',
      'mother_address',
      'mother_contact_no',
      

      'spouse_name',
      'spouse_address',
      'spouse_contact_no',

      'admission_date',
      'discharge_date',
      'total_day'

    ];


    public function patient_admissions(){
        return $this->hasMany(PatientAdmission::class, 'patient_id', 'patient_id')
            ->orderBy('patient_admission_id', 'desc');

    }


}
