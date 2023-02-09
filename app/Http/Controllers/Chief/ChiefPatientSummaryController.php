<?php

namespace App\Http\Controllers\Chief;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientAdmission;
use Illuminate\Http\Request;

class ChiefPatientSummaryController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index($admissionId, $patientId){
        return view('chief.chief-patient-summary')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function summary($admissionId, $patientId){

        $data = PatientAdmission::with(['patient', 'history', 'physical_exam', 
            'doctor_orders', 'nurse_notes', 'medications'])
            ->where('patient_id', $patientId)
            ->where('patient_admission_id', $admissionId)
            ->first();

        return $data;
    }



}
