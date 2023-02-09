<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        return view('administrator.designation');
    }

    public function getDesignations(Request $req){
        $sort = explode('.', $req->sort_by);

        $data = Designation::where('designation', 'like', $req->designation . '%')
            ->orderBy($sort[0], $sort[1])
            ->paginate($req->perpage);

        return $data;
    }

    public function show($id){
        $data = Designation::find($id);
        return $data;
    }

    public function store(Request $req){
        $req->validate([
            'designation' => ['required', 'unique:designations']
        ]);

        Designation::create([
            'designation' => strtoupper($req->designation)
        ]);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }


    public function update(Request $req, $id){
        $req->validate([
            'designation' => ['required', 'unique:designations,designation,' .$id.',designation_id']
        ]);

        $data = Designation::find($id);
        $data->designation = strtoupper($req->designation);
        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }


    public function destroy($id){
        Designation::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }
}
