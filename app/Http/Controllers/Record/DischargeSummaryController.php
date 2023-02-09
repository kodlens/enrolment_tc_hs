<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;

class DischargeSummaryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($admissionId, $patientId){
        return view('record.discharge-summary')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }
}
