<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Student;
use App\Models\Cours;
use App\Models\Teacher;
use App\Models\Classes;
use App\Models\Exercices;
use App\Models\ExerciceRemis;
use Carbon\Carbon;

class ExerciceStudentsController extends Controller
{
    public function index()
    {
        $exercices = Exercices::all();
        $matieres = Matieres::all();
        $teachers = Teacher::all();
        $classes = Classes::all();
        $exerciceRemis = ExerciceRemis::all();
        $cours = Cours::all();
        return view('Students.Exercices.indexExercices',compact('matieres','teachers','classes','cours','exercices','exerciceRemis'));
    }
    public function RemisExercice(Request $request , $id)
    {
        $file = $request->file('file');
        $exercice = Exercices::findOrFail($id);
        $exerciceRemis = new ExerciceRemis();
        $exerciceRemis->Exercice_id = $exercice->id;
        $exerciceRemis->file_name = $exercice->name;
        $fileName = uniqid($exerciceRemis->file_name) . '.' . $file->getClientOriginalExtension();
        $exerciceRemis->file_name = $fileName;
        $exerciceRemis->Student_id = 1;
        $file->move('public',$fileName);
        $exerciceRemis->Remis = 1;
        // $request->file->store('public');
        $exerciceRemis->save();
        return redirect('/studentHome')->with('status',"Votre travail de l'exercice ".$exercice->name.' est ajouté');
    }
    public function download($id)
    {
        $dl = Exercices::findorFail($id);
        $path_to_file = public_path('/public/' . $dl->file_name);
        // return Storage::response($path_to_file);
        return response()->download($path_to_file, 'example.pdf', [], 'inline');

    }
    public function view($id)
    {
        $dl = Exercices::findorFail($id);
        $pathToFile = public_path('/public/' . $dl->file_name);
        return response()->file($pathToFile);
    }
    public function Store()
    {
        return view('Students.indexStudent');
    }
}
