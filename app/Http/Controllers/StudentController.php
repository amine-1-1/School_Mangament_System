<?php





namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:20',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'email' => 'required|email|max:255|unique:students',
            'phone_number' => 'required|digits:8',
            'birth_date' => 'required|date_format:Y-m-d|',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $birthDate = $request->input('birth_date');
        $phoneNumber = $request->input('phone_number');
        $password = Str::random(10);

        $student = new Student();
        $student->first_name = $firstName;
        $student->last_name = $lastName;
        $student->email = $email;
        $student->password = Hash::make($password);
        $student->phone_number = $phoneNumber;
        $student->birth_date = $birthDate;
        $student->save();
        return redirect()->route('admin.student.index');

    }

    public function editInfo($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.students.edit', compact('student'));
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

        return redirect()->route('admin.student.index');
    }

    public function editPassword($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.password', compact('student'));
    }

    public function updatePassword(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'new_password' => 'required|confirmed|min:8',
        ]);

        $password = $request->input('new_password');
        $student->password = Hash::make($password);
        $student->save();

        return redirect()->route('admin.student.index');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('admin.student.index');
    }
}
