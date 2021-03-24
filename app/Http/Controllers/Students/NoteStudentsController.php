<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Student;
use App\Models\Notes;
use App\Models\Teacher;
use App\Models\Classes;

class NoteStudentsController extends Controller
{
    public function index()
    {
        $matieres = Matieres::all();
        $students = Student::all();
        $teachers = Teacher::all();
        $notes = Notes::all();
        $classes = Classes::all();
        return view('Students.NoteStudents.indexNoteStudents', compact('matieres', 'students', 'teachers', 'notes', 'classes'));
    }
}
