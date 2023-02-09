<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

use App\Models\PatientDoctorDiagnose;
use Illuminate\Http\Request;


class DoctorPatientDiagnoseController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($admissionId, $patientId){

        return view('doctor.doctor-patient-diagnose')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getDiagnose($admissionId, $patientId){
        $data = PatientDoctorDiagnose::where('patient_admission_id', $admissionId)
            ->where('patient_id', $patientId)
            ->first();

        return $data;
    }

    public function store(Request $req){

        $arrData = [
            'patient_id' => $req->patient_id,
            'patient_admission_id' => $req->patient_admission_id,
            'admission_diagnosis' => $req->admission_diagnosis,
            'principal_diagnosis' => $req->principal_diagnosis,
            'other_diagnosis' => $req->other_diagnosis,
            'principal_operation_procedure' => $req->principal_operation_procedure,
            'other_principal_operation_procedure' => $req->other_principal_operation_procedure,
            'accident_injuries' => $req->accident_injuries,

            'place_occurence' => $req->place_occurence,
            'disposition' => $req->disposition,
            'result' => $req->result,
        ];

        PatientDoctorDiagnose::updateOrCreate(
            [
                'patient_admission_id' => $req->patient_admission_id,
                'patient_id' => $req->patient_id,
            ],
            $arrData);


        return response()->json([
            'status' => 'saved'
        ], 200);
    }
}
