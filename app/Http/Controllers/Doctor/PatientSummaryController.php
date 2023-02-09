<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientAdmission;

class PatientSummaryController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index($admissionId, $patientId){
        return view('doctor.patient-summary')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function summary($admissionId, $patientId){

        $data = PatientAdmission::with(['patient', 'history', 'physical_exam', 
            'doctor_orders', 'nurse_notes'])
            ->where('patient_id', $patientId)
            ->where('patient_admission_id', $admissionId)
            ->first();
        return $data;
    }


}
