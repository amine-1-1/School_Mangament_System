<?php

namespace App\Http\Controllers;

use App\Models\Classes;

use App\Models\Student;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        $classrooms = Classes::paginate(5);


        return view('admin.classroom.index', compact('classrooms'));
    }
    public function View($id)
    {
        $classroom = Classes::findOrFail($id);
        $students = Student::all();
        return view('admin.classroom.view', compact('classroom','students'));
    }

    public function create()
    {
        $students = Student::all();

        return view('admin.classroom.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'year' => 'required|min:1|integer',
        ]);

        $name = $request->input('name');
        $year = $request->input('year');

        $classroom = new Classes();
        $classroom->name = $name;
        $classroom->year = $year;
        $classroom->save();

        return redirect()->route('admin.classroom.index');
    }

    public function getInto($id)
    {
        $classroom = Classes::findOrFail($id);
        $students = Student::all();
        return view('admin.classroom.get-into', compact('classroom', 'students'));
    }

    public function add($id)
    {
        $classroom = Classes::findOrFail($id);
        $students = Student::all();
        return view('admin.classroom.add', compact('classroom', 'students'));
    }

    public function add_store(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|min:1|integer',
        ]);
        $classroom = Classes::findorfail($id);
        $student_id = $request->input('student_id');
        $student = Student::findorfail($student_id);
        $student->Classe_id = $classroom->id;
        $student->save();
        $classroom->save();

        return redirect()->route('classroom.getInto', $classroom->id);
    }
    public function editNumber($id){
        $classroom = Classes::findorfail($id);
        $students = Student::all();
        $studentNumber=Student::where('Classe_id',$id)->count();
        $classroom->number=$studentNumber;
        $classroom->save();

        return view('admin.classroom.view', compact('students','classroom'));

    }
    public function updateNumber(Request $request,$id){
        $classroom = Classes::findorfail($id);
        $students = Student::all();
        $studentNumber=Student::where('Class_id','id')->count();
        $classroom->number=$studentNumber;
        $classroom->save();
        return redirect()->route('admin.Classroom.view');

    }
}
