<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorOrder;
use Illuminate\Http\Request;


class DoctorOrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($admissionId, $patientId){
        return view('doctor.doctor-order')
            ->with('admissionId', $admissionId)
            ->with('patientId', $patientId);
    }

    public function getDoctorOrders($admissionId, $patientId){
        $data = DoctorOrder::where('patient_admission_id', $admissionId)
            ->where('patient_id', $patientId)
            ->get();

        return $data;

    }

    public function store(Request $req){
        //return $req;

        foreach($req->all() as $item){
            //return $item['doctor_date_time_created'];

            DoctorOrder::updateOrCreate(
                [
                    'doctor_order_id' => $item['doctor_order_id'],
                ],
                [
                    'patient_id' => $item['patient_id'],
                    'patient_admission_id' => $item['patient_admission_id'],
                    'doctor_date_time_created' => $item['doctor_date_time_created'],
                    'progress_notes' => $item['progress_notes'],
                    'order' => $item['order'],
                    'letter_c' => $item['letter_c'],
                    'letter_a' => $item['letter_a'],
                    'letter_r' => $item['letter_r'],
                    'letter_e' => $item['letter_e'],
                    'letter_d' => $item['letter_d']
                ]);
        }

        return response()->json([
            'status' => 'saved'
        ],200);

    }


    public function destroy($id){
        DoctorOrder::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }

}
