<?php

namespace App\Http\Controllers\Chief;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class ChiefPatientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('chief.chief-patients');
    }

    public function getChiefPatient(Request $req){
        $sort = explode('.', $req->sort_by);

        $data = Patient::with(['patient_admissions'])
            ->where('lname', 'like', $req->lname . '%')
            ->where('fname', 'like', $req->fname . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);
        return $data;
    }



}
