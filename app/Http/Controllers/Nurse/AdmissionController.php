<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\NursePatient;

class AdmissionController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('nurse.admission');
    }

    public function browsePatient(Request $req){
        $sort = explode('.', $req->sort_by);
        $data = Patient::where('lname', 'like', $req->lname . '%')
            ->where('fname', 'like', $req->fname . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);
            
        return $data;
    }
    


    
}
