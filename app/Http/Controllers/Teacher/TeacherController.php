<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function feedback()
    {
        return view('Teachers.indexFeedback');
    }
    public function index()
    {
        return view('Teachers.indexTeacher');

    }
    public function editInfo($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('Teachers.teachers.edit', compact('teacher'));
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

        return redirect()->route('teacher.profile.index');
    }

    public function editPassword($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('Teachers.teachers.password', compact('teacher'));
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

        return redirect()->route('teacher.profile.index');
    }

}
