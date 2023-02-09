<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientAdmission;
use App\Models\PatientDoctorDiagnose;
use Illuminate\Http\Request;

class DoctorPatientDispositionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($admissionId, $patientId){

        return view('doctor.doctor-patient-disposition')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getPatientInfo($admissionId, $patientId){

        $data = PatientAdmission::where('patient_id', $patientId)
            ->where('patient_admission_id', $admissionId)
            ->with(['patient', 'doctor_diagnose', 'history'])
            ->first();
        return $data;
    }


    public function getPatientDoctorToDischarge($admissionId, $patientId){
        $data = PatientDoctorDiagnose::where('patient_id', $patientId)
            ->where('patient_admission_id', $admissionId)
            ->with(['patient', 'patient_admission'])
            ->first();
        return $data;
    }

    public function store(Request $req){



       // return  $admission_date = $data->admission_date;

        PatientDoctorDiagnose::where('patient_id', $req->patient_id)
            ->where('patient_admission_id', $req->patient_admission_id)
            ->update([
                'principal_diagnosis' => $req->principal_diagnosis,
                'laboratory_findings' => $req->laboratory_findings,
                'other_diagnosis' => $req->other_diagnosis,
                'medication_disposition' => $req->medication_disposition,
                'disposition' => $req->disposition,
                'result' => $req->result,
            ]);



        $data = PatientAdmission::where('patient_id', $req->patient_id)
            ->where('patient_admission_id', $req->patient_admission_id)
            ->first();

        $diff = strtotime($data->discharge_date) - strtotime($data->admission_date);
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        $totalDay = abs(round($diff / 86400));


        PatientAdmission::where('patient_id', $req->patient_id)
            ->where('patient_admission_id', $req->patient_admission_id)
            ->update([
                'discharge_date' => $req->real_discharge_date,
                'total_day' => $totalDay,
            ]);
        return response()->json([
            'status' => 'saved'
        ], 200);
    }

}
