<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientHistory;

class DoctorPatientHistory extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }


    public function index($admissionId, $patientId){
        return view('doctor.doctor-patient-history')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getHistory($admissionId,$patientId){
        $data = PatientHistory::where('patient_admission_id', $admissionId)
            ->where('patient_id', $patientId)
            ->first();

        return $data;
    }


    public function store(Request $req){
        
        $arrData = [
            'patient_id' => $req->patient_id,
            'patient_admission_id' => $req->patient_admission_id,
            'general_data' => $req->general_data,
            'present_complain' => $req->present_complain,
            'past_history' => $req->past_history,
            'family_history' => $req->family_history,
            'occupation_environment' => $req->occupation_environment,
            'alcohol' => $req->alcohol, 
            'tobacco' => $req->tobacco,
            'drug_allergies' => $req->drug_allergies,
            'other_allergies' => $req->other_allergies,
        ];

        PatientHistory::updateOrCreate(
            [
                'patient_admission_id' => $req->patient_admission_id,
                'patient_id' => $req->patient_id
            ],
            $arrData);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }

}
