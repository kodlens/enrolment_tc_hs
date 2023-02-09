<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Religion;
use App\Models\Nationality;
use App\Models\User;
use App\Models\NursePatient;


class NursePatientController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('nurse');
    }

    public function index(){
        $doctors = User::where('role', 'DOCTOR')
            ->get();

        return view('nurse.nurse-patient')
            ->with('doctors', $doctors);
    }

    public function getNursePatients(Request $req){
        $sort = explode('.', $req->sort_by);

        $data = Patient::with(['patient_admissions'])
            ->where('lname', 'like', $req->lname . '%')
            ->where('fname', 'like', $req->fname . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);
        return $data;
    }


    public function create(Request $req){
        $religions = Religion::orderBy('religion', 'asc')->get();
        $nationalities = Nationality::orderBy('nationality', 'asc')->get();

        return view('nurse.nurse-patient-create-update')
            ->with('religions', $religions)
            ->with('nationalities', $nationalities)
            ->with('lname', $req->lname)
            ->with('fname', $req->fname);
    }





    public function edit($id){

        $religions = Religion::orderBy('religion', 'asc')->get();
        $nationalities = Nationality::orderBy('nationality', 'asc')->get();

        $data = Patient::find($id);

        return view('nurse.nurse-patient-create-update')
            ->with('religions', $religions)
            ->with('nationalities', $nationalities)
            ->with('data', $data);
    }

    public function update(Request $req, $id){
        $req->validate([
            'lname' => ['required'],
            'fname' => ['required'],
            'sex' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'barangay' => ['required'],
            'mother_maiden_name' => ['required'],
        ]);

        $dob = date("Y-m-d", strtotime($req->bdate)); //convert to date format UNIX
        $data = Patient::find($id);

        $data->lname = strtoupper($req->lname);
        $data->fname = strtoupper($req->fname);
        $data->mname = strtoupper($req->mname);
        $data->suffix = strtoupper($req->suffix);
        $data->province = $req->province;
        $data->city = $req->city;
        $data->barangay = $req->barangay;
        $data->street = $req->street;
        $data->contact_no = $req->contact_no;

        $data->sex = strtoupper($req->sex);
        $data->civil_status = strtoupper($req->civil_status);
        $data->bdate = $dob;

        $data->birthplace = strtoupper($req->birthplace);
        $data->nationality = strtoupper($req->nationality);
        $data->religion = strtoupper($req->religion);

        $data->mother_maiden_name = strtoupper($req->mother_maiden_name);
        $data->father_name = strtoupper($req->father_name);
        $data->family_history = $req->family_history;

        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }



    public function destroy($id){
        //return $id;

        NursePatient::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }
}
