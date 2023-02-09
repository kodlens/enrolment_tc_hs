<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\Nationality;

class OpenController extends Controller
{
    //

    public function loadNationalities(){
        return Nationality::orderBy('nationality', 'asc')
            ->get();
    }

    public function loadReligions(){
        return Religion::orderBy('religion', 'asc')
            ->get();
    }
}
