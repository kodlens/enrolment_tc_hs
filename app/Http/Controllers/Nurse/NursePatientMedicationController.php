<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\DoctorOrder;
use App\Models\PatientMedication;
use Illuminate\Http\Request;

class NursePatientMedicationController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($admissionId, $patientId){
        return view('nurse.nurse-patient-medications')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getPatientMedications($admissionId, $patientId){
        $data = PatientMedication::where('patient_admission_id', $admissionId)
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

        //return $req;
        foreach($req->all() as $item){
            //return $item['doctor_date_time_created'];

            PatientMedication::updateOrCreate(
                [
                    'patient_medication_id' => $item['patient_medication_id'],
                ],
                [
                    'patient_id' => $item['patient_id'],
                    'doctor_order' => $item['doctor_order'],
                    'patient_admission_id' => $item['patient_admission_id'],
                    'datetime_created' => $item['datetime_created'],
                    'medication' => $item['medication'],
                    'remarks' => $item['remarks'],
                ]);
        }

        return response()->json([
            'status' => 'saved'
        ],200);

    }

}
