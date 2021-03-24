<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        if (Auth::guard('admin')->user()->role_id == 1) {
            $roles = Role::all();
        } else {
            $roles = Role::where('id', '!=', 1)->get();
        }
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:20',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:20',
            'email' => 'required|email|max:255|unique:users',
            'role_id' => 'required|min:1|integer',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $role = $request->input('role_id');
        $password = Str::random(10);


        $user = new User();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->role_id = $role;
        $user->password = Hash::make($password);
        $user->save();




        return redirect()->route('admin.users.index');
    }

    public function editInfo($id)
    {
        $user = User::findOrFail($id);
        if (Auth::guard('admin')->user()->role_id == 1) {
            $roles = Role::all();
        } else {
            $roles = Role::where('id', '!=', 1)->get();
        }
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function updateInfo(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'string|required|max:20',
            'last_name' => 'string|required|max:20',
            'role_id' => 'required|min:1|integer',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $role = $request->input('role_id');

        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->role_id = $role;
        $user->save();
        return redirect()->route('admin.users.index');
    }
    public function editPassword($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'new_password' => 'required|confirmed|min:8',

        ]);
        $password = $request->input('new_password');
        $user->password = Hash::make($password);
        $user->save();
        return redirect()->route('admin.users.index');
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
