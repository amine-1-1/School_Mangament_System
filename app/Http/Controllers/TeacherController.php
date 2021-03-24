<?php





namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:20',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'email' => 'required|email|max:255|unique:teachers',
            'phone_number' => 'required|digits:8',
            'birth_date' => 'required|date_format:Y-m-d|',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $birthDate = $request->input('birth_date');
        $phoneNumber = $request->input('phone_number');
        $password = Str::random(10);

        $teacher = new Teacher();
        $teacher->first_name = $firstName;
        $teacher->last_name = $lastName;
        $teacher->email = $email;
        $teacher->password = Hash::make($password);
        $teacher->phone_number = $phoneNumber;
        $teacher->birth_date = $birthDate;
        $teacher->save();
        return redirect()->route('admin.teacher.index');

    }

    public function editInfo($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.edit', compact('teacher'));
    }

    public function updateInfo(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'first_name' => 'string|required|max:20',
            'last_name' => 'string|required|max:20',
            'phone_number' => 'required|digits:8',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $phoneNumber = $request->input('phone_number');
        $teacher->first_name = $firstName;
        $teacher->last_name = $lastName;
        $teacher->phone_number = $phoneNumber;
        $teacher->save();

        return redirect()->route('admin.teacher.index');
    }

    public function editPassword($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.password', compact('teacher'));
    }

    public function updatePassword(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'new_password' => 'required|confirmed|min:8',
        ]);

        $password = $request->input('new_password');
        $teacher->password = Hash::make($password);
        $teacher->save();

        return redirect()->route('admin.teacher.index');
    }

    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('admin.teacher.index');
    }
}
