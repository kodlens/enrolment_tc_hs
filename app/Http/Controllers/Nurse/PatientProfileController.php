<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientProfileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $req){

        //return $req->birthplace;
        $req->validate([
            'admission_type' => ['required'],
            'lname' => ['required'],
            'fname' => ['required'],
            'sex' => ['required'],
            'per_address' => ['required'],
            'age' => ['required'],
            'bdate' => ['required'],
            'contact_no' => ['required'],

        ]);

        $admission_type = $req->admission_type;
        $dob = date('Y-m-d', strtotime($req->birthdate));

        $arrData = [
            'admission_type' => strtoupper($req->admission_type),
            'lname' => strtoupper($req->lname),
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'suffix' => strtoupper($req->suffix),
            'ward_room' => strtoupper($req->ward_room),
            'per_address' => strtoupper($req->per_address),
            'contact_no' => $req->contact_no,
            'sex' => strtoupper($req->sex),
            'civil_status' => strtoupper($req->civil_status),
            'bdate' => $dob,
            'age' => $req->age,
            'birthplace' => strtoupper($req->birthplace),

            'nationality' => strtoupper($req->nationality),
            'religion' => strtoupper($req->religion),
            'occupation' => strtoupper($req->occupation),

            'employer' => strtoupper($req->employer),
            'employer_address' => strtoupper($req->employer_address),
            'employer_contact_no' => strtoupper($req->employer_contact_no),

            'father_name' => strtoupper($req->father_name),
            'father_address' => strtoupper($req->father_address),
            'father_contact_no' => strtoupper($req->father_contact_no),

            'mother_maiden_name' => strtoupper($req->mother_maiden_name),
            'mother_address' => strtoupper($req->mother_address),
            'mother_contact_no' => strtoupper($req->mother_contact_no),

            'spouse_name' => strtoupper($req->spouse_name),
            'spouse_address' => strtoupper($req->spouse_address),
            'spouse_contact_no' => strtoupper($req->spouse_contact_no),
        ];

        if($admission_type == 'OLD'){
            //update
            $data = Patient::where('patient_id', $req->patient_id)
                ->update($arrData);

            $data = Patient::find($req->patient_id);
        }else{
            //create
            $data = Patient::create($arrData);
        }


        return response()->json([
            'status' => 'saved',
            'data' => $data
        ], 200);;
    }

}
