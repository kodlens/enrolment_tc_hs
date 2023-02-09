<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\PatientAdmission;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientAdmissionController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function store(Request $req){

        $req->validate([
            'admission_date' => ['required'],
        ]);

        PatientAdmission::create([
            'patient_id' => $req->patient_id,
            'admission_date' => $req->admission_date,
            'discharge_date' => $req->discharge_date,
            'total_day' => $req->total_day,
            'ward_room' => $req->ward_room,
            'admitting_physician' => $req->admitting_physician,
            'admitting_clerk' => $req->admitting_clerk,
            'attending_physician' => $req->attending_physician,
            'referred_by' => $req->referred_by,
            'social_service_classification' => $req->social_service_classification,
            'allergic_to' => $req->allergic_to,
            'hospitalization_name' => $req->hospitalization_name,
            'health_inssurance' => $req->health_inssurance,
            'phic' => $req->phic,
            'data_furnished_by' => $req->data_furnished_by,
            'address_informant' => $req->address_informant,
            'admission_diagnosis' => $req->admission_diagnosis,
            'bp' => $req->bp,
            'cr' => $req->cr,
            'rr' => $req->rr,
            'temp' => $req->temp,
        ]);


        return response()->json([
            'status' => 'saved'
        ], 200);



    }
    
}
