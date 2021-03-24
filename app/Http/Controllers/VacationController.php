<?php
namespace App\Http\Controllers;

use App\Models\Vacation;
use Carbon\Carbon;

class VacationController extends Controller
{

    public function index()
    {
        $vacations = Vacation::paginate(5);
        return view('admin.vacations.index', compact('vacations'));
    }

    public function accept($id)
    {
        $vacation = Vacation::findOrFail($id);
        if ($vacation->status == 0) {
            $vacation->status = 1;
            $vacation->save();
        }
        return redirect()->route('vacation.index')->with('accepted',true);


    }

    public function refuse($id)
    {
        $vacation = Vacation::findOrFail($id);
        if ($vacation->status == 0) {
            $vacation->status = 2;
            $vacation->save();

        }
        return redirect()->route('vacation.index')->with('refused',true);

    }

}
