<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientDiagnose;
use App\Models\Patient;

class NursePatientDiagnoseController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function index($id){
        $patient = Patient::find($id);

        return view('nurse.nurse-patient-diagnoses')
            ->with('patientId', $id)
            ->with('patient', $patient);

    }
    public function getPatientDiagnoses(Request $req, $patientId){

        $sort = explode('.', $req->sort_by);

        $data = PatientDiagnose::where('patient_id', $patientId)
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }

    public function store(Request $req){
        //return $req;

        PatientDiagnose::create([
            'patient_id' => $req->patient_id,
            'date_admission' => date('Y-m-d'),
            'present_complain' => $req->present_complain,
            'admission_diagnose' => $req->admission_diagnose,
            'principal_diagnose' => $req->principal_diagnose,
            'doctor_id' => $req->doctor,
            'skin' => $req->skin,
            'head_eent' => $req->head_eent,
            'lymp_notes' => $req->lymp_notes,
            'chest' => $req->chest,
            'lungs' => $req->lungs,
            'cardiovascular' => $req->cardiovascular,
            'breast' => $req->breast,
            'abdoment' => $req->abdoment,
            'rectum' => $req->rectum,
            'genetalia' => $req->genetalia,
            'musculoskeletal' => $req->musculoskeletal,
            'extremities' => $req->extremities,
            'neurological' => $req->neurological,
        ]);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }
}
