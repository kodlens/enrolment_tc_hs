<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PatientSystemReview;

class DoctorPatientSystemReviewController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index($admissionId, $patientId){
        return view('doctor.doctor-patient-system-review')
        ->with('admissionId', $admissionId)
        ->with('patientId', $patientId);
    }

    public function getSystemReview($admissionId,$patientId){
        $data = PatientSystemReview::where('patient_admission_id', $admissionId)
            ->where('patient_id', $patientId)
            ->first();

        return $data;
    }


    public function store(Request $req){

        $arrData = [
            'patient_id' => $req->patient_id,
            'patient_admission_id' => $req->patient_admission_id,
            'general' => $req->general,
            'skin' => $req->skin,
            'eent' => $req->eent,
            'musculoskeletal' => $req->musculoskeletal,
            'respiratory' => $req->respiratory,
            'cardiovascular' => $req->cardiovascular,
            'gastrointestinal' => $req->gastrointestinal, 
            'genitourinary' => $req->genitourinary,
            'female_reproductive' => $req->female_reproductive,
            'nervous' => $req->nervous,
            'past_disease' => $req->past_disease,
            'history_cancer' => $req->history_cancer,
            'ptb' => $req->ptb,
            'asthma' => $req->asthma,
            'cancer' => $req->cancer,
        ];

        PatientSystemReview::updateOrCreate([
            'patient_admission_id' => $req->patient_admission_id,
            'patient_id' => $req->patient_id
        ],$arrData);

        return response()->json([
            'status' => 'saved'
        ], 200);

    }
}
