<?php

namespace App\Http\Controllers\Teacher;



use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index($id){
        $teacher = Teacher::findOrFail($id);
        $contracts = $teacher->contracts;
        return view('teachers.contract.contract', compact('teacher', 'contracts'));

    }
    public function download($id){
        $dl =Contract ::findorFail($id);
        $path_to_file= public_path('/public/'.$dl->file_name);

        return response()->download($path_to_file, 'example.pdf', [], 'inline');

    }
    public function view($id){
        $dl =Contract ::findorFail($id);
        $pathToFile=public_path('/public/'.$dl->file_name);;
        return response()->file($pathToFile );
    }
}
