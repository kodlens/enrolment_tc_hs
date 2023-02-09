<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PatientAdmission;

class DoctorAdmissionPatient extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        return view('doctor.doctor-admission-patient')
            ->with('id', $id);
    }


    public function store(Request $req){



        return response()->json([
            'status' => 'saved'
        ], 200);
        
    }
}
