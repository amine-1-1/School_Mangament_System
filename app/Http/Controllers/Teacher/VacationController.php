<?php

namespace App\Http\Controllers\Teacher;


use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacationController extends Controller
{
    public function index($id)
    {
        $teacher = Teacher::findOrFail($id);
        $vacations = $teacher->vacations;
        return view('teachers.vacation.vacation', compact('teacher', 'vacations'));

    }

    public function createVacation()
    {

        return view('teachers.vacation.vacations-create');

    }

    public function storeVacation(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date_format:Y-m-d|',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
            'reason' => 'required|string|max:100',

        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $reason = $request->input('reason');

            $vacation = new Vacation();
            $vacation->start_date = $startDate;
            $vacation->end_date = $endDate;
            $vacation->reason = $reason;
            $vacation->teacher_id = Auth::guard('teacher')->user()->id;
            $teacher = Teacher::findOrFail(Auth::guard('teacher')->user()->id);
            $vacation->save();
            return redirect()->route('teacher.vacations', Auth::guard('teacher')->user()->id);
    }
}
