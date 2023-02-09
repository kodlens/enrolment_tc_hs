<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\DoctorOrder;
use App\Models\NurseNote;
use Illuminate\Http\Request;

class NurseNoteController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($admissionId, $patientId){
        return view('nurse.nurse-notes')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getNurseNotes($admissionId, $patientId){
        $data = NurseNote::where('patient_admission_id', $admissionId)
            ->where('patient_id', $patientId)
            ->get();

        return $data;

    }

    public function getDoctorOrderForPatient($admissionId, $patientId){
        $data = DoctorOrder::where('patient_admission_id', $admissionId)
            ->where('patient_id', $patientId)
            ->get();

        return $data;
    }


    public function store(Request $req){


        foreach($req->all() as $item){
            //return $item['doctor_date_time_created'];

            NurseNote::updateOrCreate(
                [
                    'nurse_note_id' => $item['nurse_note_id'],
                ],
                [
                    'patient_id' => $item['patient_id'],
                    'doctor_order' => $item['doctor_order'],
                    'patient_admission_id' => $item['patient_admission_id'],
                    'date_time_created' => $item['date_time_created'],
                    'focus' => $item['focus'],
                    'nurse_notes' => $item['nurse_notes'],
                ]);
        }

        return response()->json([
            'status' => 'saved'
        ],200);

    }



}
