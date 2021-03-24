<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\ClassRoom;
//use App\Models\Student;
//use Illuminate\Http\Request;
//
//class ClassRoomsController extends Controller
//{
//    public function index()
//    {
//        $classrooms = ClassRoom::paginate(5);
//
//
//        return view('admin.classroom.index', compact('classrooms'));
//    }
//
//    public function create()
//    {
//        $students = Student::all();
//
//        return view('admin.classroom.create', compact('students'));
//    }
//
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string',
//            'year' => 'required|min:1|integer',
//        ]);
//
//        $name = $request->input('name');
//        $year = $request->input('year');
//
//        $classroom = new ClassRoom();
//        $classroom->name = $name;
//        $classroom->year = $year;
//        $classroom->save();
//
//        return redirect()->route('admin.classroom.index');
//    }
//
//    public function getInto($id)
//    {
//        $classroom = ClassRoom::findOrFail($id);
//        $students = Student::all();
//        return view('admin.classroom.get-into', compact('classroom', 'students'));
//    }
//
//    public function add($id)
//    {
//        $classroom = ClassRoom::findOrFail($id);
//        $students = Student::all();
//        return view('admin.classroom.add', compact('classroom', 'students'));
//    }
//
//    public function add_store(Request $request, $id)
//    {
//        $request->validate([
//            'student_id' => 'required|min:1|integer',
//        ]);
//        $classroom = ClassRoom::findorfail($id);
//        $student_id = $request->input('student_id');
//        $student = Student::findorfail($student_id);
//        $student->classroom_id = $classroom->id;
//        $student->save();
//        $number = Student::where('classroom_id', '=', '1')->count();
//        $classroom->number = $number;
//        $classroom->save();
//
//        return redirect()->route('classroom.getInto', $classroom->id);
//    }
//
//}
