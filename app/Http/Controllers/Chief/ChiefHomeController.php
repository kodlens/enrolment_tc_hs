<?php

namespace App\Http\Controllers\Chief;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChiefHomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('chief.chief-home');
    }




}
