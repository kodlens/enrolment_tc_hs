<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorOrder;
use App\Models\DoctorOrderDetail;
use Auth;

class NursePatientDiagnoseDoctorOrderController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        return view('nurse.nurse-patient-diagnose-doctor-orders')
            ->with('patient_diagnose_id', $id);
    }

    public function getDoctorOrders($id){

        $data = DoctorOrder::with(['doctor_order_details', 'patient'])
            ->where('patient_diagnose_id', $id)
            ->first();
        return $data;
    }

    public function updateOrderDetail(Request $req){
        $user = Auth::user();
        $data = DoctorOrderDetail::find($req->doctor_order_detail_id);
        $data->nurse_date_time_execute = date('Y-m-d H:i:s');
        $data->letter_c = $req->letter_c;
        $data->letter_a = $req->letter_a;
        $data->letter_r = $req->letter_r;
        $data->letter_e = $req->letter_e;
        $data->letter_d = $req->letter_d;
        $data->nurse_id = $user->user_id;
        $data->save();


        return response()->json([
            'status' => 'updated'
        ], 200);
    }
}
