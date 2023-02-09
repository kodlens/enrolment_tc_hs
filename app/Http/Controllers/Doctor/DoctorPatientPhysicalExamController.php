<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\PhysicalExam;
use Illuminate\Http\Request;

class DoctorPatientPhysicalExamController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index($admissionId, $patientId){
        return view('doctor.doctor-patient-physical-exam')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getPhysicalExam($admissionId,$patientId){
        $data = PhysicalExam::where('patient_admission_id', $admissionId)
            ->where('patient_id', $patientId)
            ->first();

        return $data;
    }


    public function store(Request $req){

        $arrData = [

            'patient_id' => $req->patient_id,
            'patient_admission_id' => $req->patient_admission_id,
            'skin' => $req->skin,
            'head_eent' => $req->head_eent,
            'lymp_notes' => $req->lymp_notes,
            'chest' => $req->chest,
            'lungs' => $req->lungs,
            'cardiovascular' => $req->cardiovascular,
            'breast' => $req->breast,
            'abdomen' => $req->abdomen,
            'rectum' => $req->rectum,
            'genitalia' => $req->genitalia,
        ];

        PhysicalExam::updateOrCreate([
            'patient_admission_id' => $req->patient_admission_id,
            'patient_id' => $req->patient_id
        ],$arrData);

        return response()->json([
            'status' => 'saved'
        ], 200);

    }
}
