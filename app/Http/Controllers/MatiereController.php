<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Matieres;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MatiereController extends Controller
{

    public function index()
    {
        $matieres = Matieres::all();
        $teachers = Teacher::all();
        $classes = Classes::all();
        return view('admin.matieres.index', compact('matieres','teachers','classes'));

    }

    public function create()
    {
        $teachers = Teacher::all();
        $classes = Classes::all();

        return view('admin.matieres.create', compact('teachers', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/u|max:20',
            'Teacher_id' => 'required|digits:1',
            'Classe_id' => 'required|digits:1',

        ]);

        $Name = $request->input('name');
        $teacherId = $request->input('Teacher_id');
        $classeId = $request->input('Classe_id');
        $subject = new Matieres();
        $subject->name = $Name;
        $subject->Teacher_id = $teacherId;
        $subject->Classe_id = $classeId;
        $subject->save();
        return redirect()->route('admin.matieres.index');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
