<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Teacher;
use App\Models\Matieres;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CoursController extends Controller
{
    public function index()
    {
        $matieres = Matieres::all();
        $teachers = Teacher::all();
        $classes = Classes::all();
        $cours = Cours::all();

        return view('Teachers.Cours.indexCours',compact('matieres','teachers','classes','cours'));
    }
    public function UploadCours(Request $request)
    {
        $matieres = Matieres::all();
        $teachers = Teacher::all();
        $classes = Classes::all();
        return view('Teachers.Cours.AjouterCours',compact('matieres','teachers','classes'));
    }
    public function UploadFile(Request $request)
    {
        $file = $request->file('file');
        $cours = new Cours();
        $cours->name = $request->input('name');
        $fileName = uniqid($cours->name) . '.' . $file->getClientOriginalExtension();
        $cours->file_name = $fileName;
        $cours->Matiere_id = $request->input('Matiere_id');
        $cours->Teacher_id = Auth::guard('teacher')->user()->id;
        $cours->Classe_id = $request->input('Classe_id');
        $file->move('public',$fileName);
        // $request->file->store('public');
        $cours->save();
        return redirect('/Cours')->with('status','cours ajouté');
    }


    public function delete($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        return redirect('/Cours')->with('status','cours éffacé');
    }
    public function download($id)
    {
        $dl = Cours::findorFail($id);
        $path_to_file = public_path('/public/' . $dl->file_name);
        // return Storage::response($path_to_file);
        return response()->download($path_to_file, 'example.pdf', [], 'inline');

    }
    public function view($id)
    {
        $dl = Cours::findorFail($id);
        $pathToFile = public_path('/public/' . $dl->file_name);
        return response()->file($pathToFile);
    }
}
