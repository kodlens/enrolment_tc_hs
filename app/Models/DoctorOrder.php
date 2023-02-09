<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOrder extends Model
{
    use HasFactory;


    protected $table = 'doctor_orders';
    protected $primaryKey = 'doctor_order_id';

    protected $fillable = [
        'patient_id',
        'patient_admission_id',
        'doctor_date_time_created',
        'progress_notes',
        'order',
        'letter_c',
        'letter_a',
        'letter_r',
        'letter_e',
        'letter_d',
    ];
    

    public function patient(){
        return $this->hasOne(Patient::class, 'patient_id', 'patient_id');
    }


    public function diagnose(){
        return $this->hasOne(PatientDoctorDiagnose::class, 'patient_id', 'patient_id')
        ->with('nurse');
    }



}
