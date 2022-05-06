<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoureController extends Controller
{

    public function getCouresByPlanning(Request $req)
    {
        $coures = User::find($req->coachID)->coures($req->givenDate)->get();

        return $coures;
    }

    public function cour_count()
    {
        //------------------
        $courRows = Cour::all();
        $courCount = count($courRows);
        return $courCount;
    }
    //Cour
    public function Create_Cours()
    {
        return view('cours');
    }
    public function AllCours()
    {
        // $data = _salle::orderby('id','DESC')->get();
        $data = Cour::all();
        return response()->json($data);
    }
    //AddCour
    public function Add_Cour(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'path' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$validator->fails()) {

            $path = 'public/files';
            $file = $request->file('path');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $upload = $file->storeAs($path, $file_name);
        }
        if ($upload) {
            $data = Cour::insert([
                'nom' => $request->nom,
                'photopath' => $file_name,
            ]);
        }
        return response()->json($data);

        // return response()->json($data);
    }
    //editCour

    public function EditCour($id)
    {
        $data = Cour::findOrFail($id);
        return response()->json($data);
    }
    // updateCour
    public function UpdateCour(Request $request)
    {
        $course = Cour::findOrFail($request->id);
        $rules = [];
        $rules['nom'] = 'required';
        if ($request->path) {
            $rules['path'] = 'required|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $path = $request->file('path');
        } else {
            $path = $course->photopath;
        }
        $validator = $request->validate($rules);
        if ($course && $validator) {
            if ($request->path) {
                $full_path = 'public/files';
                $file_name = time() . '_' . $path->getClientOriginalName();
                $upload = $path->storeAs($full_path, $file_name);
            } else {
                $upload = "";
                $file_name = $path;
            }
            $data = $course->update([
                'nom' => $request->nom,
                'photopath' => $file_name,
            ]);
            return response()->json([$validator, $course, $path, $rules, $upload, $data]);
        } else {
            return response()->json([
                'message' => "has not uodated",
            ], 500);
        }
    }
    //deleteCour
    public function DeleteCour($id)
    {
        $data = Cour::findOrFail($id)->delete();
        return response()->json($data);
    }
}
