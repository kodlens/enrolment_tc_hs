<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicYear;

class OpenController extends Controller
{
    //

    public function loadAcademicYears(){
        return AcademicYear::orderBy('academic_year', 'asc')
            ->get();
    }


}
