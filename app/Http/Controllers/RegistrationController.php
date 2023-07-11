<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
    //
    public function index(){
        return view('registration');
    }


    public function store(Request $req){

        $validate = $req->validate([
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],

            'lname' => ['required', 'string', 'max:100'],
            'fname' => ['required', 'string', 'max:100'],
            'sex' => ['required', 'string', 'max:20'],
            'bdate' => ['required'],
            
            'contact_no' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
            'email' => ['required', 'unique:users', 'email'],
            'current_province' => ['required', 'string'],
            'current_city' => ['required', 'string'],
            'current_barangay' => ['required', 'string'],
            'current_zipcode' => ['max:15'],
            'permanent_zipcode' => ['max:15'],

            'if_yes_indigenous' => Rule::requiredIf(function () use ($req){
                return $req->is_indigenous == 1 ? true : false;
            }),
            'household_4ps_id_no' => Rule::requiredIf(function () use ($req){
                return $req->is_4ps == 1 ? true : false;
            }),

            
        ],
        [
            'contact_no.regex' => 'Please enter a valid Philippines mobile phone number.',
            'if_yes_indigenous.required' => 'This field is required since you belong to indigenous.',
            'household_4ps_id_no.required' => 'This field is required since you are a 4ps member.'

        ]);

        //return $req;
        //$qr_code = substr(md5(time() . $req->lname . $req->fname), -8);

        User::create([
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'email' => $req->email,
            'contact_no' => $req->contact_no,
           
            'lrn' => $req->lrn,
            'lname' => strtoupper($req->lname),
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'suffix' => strtoupper($req->suffix),
            'sex' => $req->sex,
            'bdate' => date('Y-m-d', strtotime($req->bdate)),
            'age' => $req->age,
            'birthplace' => $req->birthplace,

            'mother_tongue' => strtoupper($req->mother_tongue),
            'is_indigenous' => $req->is_indigenous,
            'if_yes_indigenous' => $req->if_yes_indigenous,
            'is_4ps' => $req->is_4ps,
            'household_4ps_id_no' => $req->household_4ps_id_no,

            'current_province' => $req->current_province,
            'current_city' => $req->current_city,
            'current_barangay' => $req->current_barangay,
            'current_street' => strtoupper($req->currentt_street),
            'current_zipcode' => $req->current_zipcode,

            'permanent_province' => $req->permanent_province,
            'permanent_city' => $req->permanent_city,
            'permanent_barangay' => $req->permanent_barangay,
            'permanent_street' => strtoupper($req->permanentt_street),
            'permanent_zipcode' => $req->permanent_zipcode,

            'role' => 'STUDENT',

            'father_lname' => strtoupper($req->father_lname),
            'father_fname' => strtoupper($req->father_fname),
            'father_mname' => strtoupper($req->father_mname),
            'father_contact_no' => $req->father_contact_no,

            'mother_maiden_lname' => strtoupper($req->mother_maiden_lname),
            'mother_maiden_fname' => strtoupper($req->mother_maiden_fname),
            'mother_maiden_mname' => strtoupper($req->mother_maiden_mname),
            'mother_maiden_contact_no' => $req->mother_maiden_contact_no,

            'guardian_lname' => strtoupper($req->guardian_lname),
            'guardian_fname' => strtoupper($req->guardian_fname),
            'guardian_mname' => strtoupper($req->guardian_mname),
            'guardian_contact_no' => $req->guardian_contact_no,

        ]);


        return response()->json([
            'status' => 'saved'
        ],200);
    }
}
