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
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function editInfo($id)
    {
        $student = Student::findOrFail($id);

        return view('Students.students.edit', compact('student'));
    }

    public function updateInfo(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'first_name' => 'string|required|max:20',
            'last_name' => 'string|required|max:20',
            'phone_number' => 'required|digits:8',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $phoneNumber = $request->input('phone_number');
        $student->first_name = $firstName;
        $student->last_name = $lastName;
        $student->phone_number = $phoneNumber;
        $student->save();

        return redirect()->route('student.profile.index');
    }

    public function editPassword($id)
    {
        $student = Student::findOrFail($id);
        return view('Students.students.password', compact('student'));
    }

    public function updatePassword(Request $request, $id)
    {
        $teacher = Student::findOrFail($id);

        $request->validate([
            'new_password' => 'required|confirmed|min:8',
        ]);

        $password = $request->input('new_password');
        $teacher->password = Hash::make($password);
        $teacher->save();

        return redirect()->route('student.profile.index');
    }
    public function indexCours()
    {
        $exercices = Exercices::all();
        $matieres = Matieres::all();
        $teachers = Teacher::all();
        $classes = Classes::all();
        $cours = Cours::all();
        $exerciceRemis = ExerciceRemis::all();
        return view('Students.Cours.indexCours',compact('matieres','teachers','classes','cours','exercices','exerciceRemis'));
    }
    public function index()
    {
        $exercices = Exercices::all();
        $matieres = Matieres::all();
        $teachers = Teacher::all();
        $classes = Classes::all();
        $cours = Cours::all();
        $exerciceRemis = ExerciceRemis::all();
        return view('Students.indexStudent',compact('matieres','teachers','classes','cours','exercices','exerciceRemis'));
    }
}
