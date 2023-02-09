<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientDiagnose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorPatientController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        return view('doctor.doctor-patients');
    }

    public function getDoctorPatients(Request $req){
        $user = Auth::user();

        $sort = explode('.', $req->sort_by);

        // $data = DB::table('patients as a')
        //     ->join('nurse_patients as b', 'a.patient_id', 'b.patient_id')
        //     ->join('patient_admissions', function($join){
        //         $join->on('patient_admissions.patient_id', 'a.patient_id');
        //     })
        //     ->where('a.lname', 'like', $req->lname . '%')
        //     ->where('a.fname', 'like', $req->fname . '%')
        //     ->orderBy('a.' . $sort[0], $sort[1])
        //     ->paginate($req->perpage);

        $data =  Patient::with(['patient_admissions'])
            ->where('lname', 'like', $req->lname . '%')
            ->where('fname', 'like', $req->fname . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }
}
