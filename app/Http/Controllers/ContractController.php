<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Teacher;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{

    public function index($id)
    {
        $teacher = Teacher::findOrFail($id);
        $contracts = $teacher->contracts;

        return view('admin.contract.index', compact('teacher', 'contracts'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $types = Type::all();
        return view('admin.contract.create', compact('teachers', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|min:1|integer',
            'type_id' => 'required|min:1|integer',
            'hired_date' => 'required|date_format:Y-m-d|',
            'departure_date' => 'required|date_format:Y-m-d|',
        ]);

        $file = $request->file('file');
        if ($file->getSize() > 0) {
            $teacherId = $request->input('teacher_id');
            $contractType = $request->input('type_id');
            $hiredDate = $request->input('hired_date');
            $departureDate = $request->input('departure_date');
            $teacher = Teacher::findorFail($teacherId);
            $fileName = uniqid($teacher->first_name . '_' . $teacher->last_name) . '.' . $file->getClientOriginalExtension();

            $contract = new Contract();
            $contract->teacher_id = $teacherId;
            $contract->type_id = $contractType;
            $contract->hired_date = $hiredDate;
            $contract->departure_date = $departureDate;
            $contract->file_name = $fileName;
            $file->move('public', $fileName);
            $contract->save();

        }

        return redirect()->route('contracts.index', $teacherId)->with('created', true);
    }

    public function editInfo($id)
    {
        $contract = Contract::findOrFail($id);
        $teacher = $contract->teacher;
        $types = Type::all();
        return view('admin.contract.edit', compact('contract', 'teacher', 'types'));

    }

    public function updateInfo(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $teacher = $contract->teacher;


        $request->validate([

            'type_id' => 'required|min:1|integer',
            'hired_date' => 'required|date_format:Y-m-d|',
            'departure_date' => 'required|date_format:Y-m-d|',
        ]);
        $file = $request->file('file');
        $typeId = $request->input('type_id');
        $hiredDate = $request->input('hired_date');
        $departureDate = $request->input('departure_date');
//        $fileName = uniqid($employee->first_name . '_' . $employee->last_name) . '.' . $file->getClientOriginalExtension();


        $contract->type_id = $typeId;
        $contract->hired_date = $hiredDate;
        $contract->departure_date = $departureDate;
//        $contract->file_name = $fileName;
//        $file->move('public', $fileName);
        $contract->save();

        return redirect()->route('contracts.index', $teacher->id)->with('contractUpdated', true);

    }

    public function download($id)
    {
        $dl = Contract::findorFail($id);
        $path_to_file = public_path('/public/' . $dl->file_name);
//        return Storage::response($path_to_file);
        return response()->download($path_to_file, 'example.pdf', [], 'inline');

    }

    public function view($id)
    {
        $dl = Contract::findorFail($id);
        $pathToFile = public_path('/public/' . $dl->file_name);
        return response()->file($pathToFile);
    }

    public function delete($id)
    {
        $contract = Contract::findOrFail($id);
        $teacher = $contract->teacher;
        $contract->delete();
        return redirect()->route('contracts.index', $teacher->id);
    }


}
