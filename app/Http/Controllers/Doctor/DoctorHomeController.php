<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorHomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('doctor.doctor-home');
    }



}
