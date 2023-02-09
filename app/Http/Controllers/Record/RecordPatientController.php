<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecordPatientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('record.record-patient');
    }
}
