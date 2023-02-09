<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NurseHomeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('nurse');

    }

    public function index(){
        return view('nurse.nurse-home');
    }
}
