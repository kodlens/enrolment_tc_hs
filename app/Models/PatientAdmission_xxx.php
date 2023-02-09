<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAdmission_xxx extends Model
{
    use HasFactory;

    protected $table = 'patient_admissions';
    protected $primaryKey = 'patient_admission_id';

    protected $fillable = [
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
    ];

}
