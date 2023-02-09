<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\PatientAdmission;
use Illuminate\Http\Request;

class DoctorPatientProfileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($admissionId, $patientId){
        return view('doctor.doctor-patient-profile')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getPatientProfile($admissionId, $patientId){
        return PatientAdmission::where('patient');
    }
}
