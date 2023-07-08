<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{

    public function index(){
        return view('administrator.academic-year');
    }

    public function getAcademicYears(Request $req){

        $sort = explode('.', $req->sort_by);

        $data = AcademicYear::where('academic_year', 'like', $req->academic_year . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }

    public function show($id){
        $data = AcademicYear::find($id);
        return $data;
    }

    public function store(Request $req){
        $req->validate([
            'academic_year' => ['required', 'unique:academic_years']
        ]);

        AcademicYear::create([
            'academic_year' => strtoupper($req->academic_year),
        ]);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }


    public function update(Request $req, $id){
       
        $req->validate([
            'academic_year' => ['required', 'unique:academic_years,academic_year,' .$id.',academic_year_id']
        ]);

        $data = AcademicYear::find($id);
        $data->academic_year = strtoupper($req->academic_year);
        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }



    public function active($id){
        AcademicYear::where('is_active', 1)
            ->update(['is_active' => 0]);
 
        $data = AcademicYear::find($id);
        $data->is_active = 1;
        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }


    public function destroy($id){
        AcademicYear::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }
}
