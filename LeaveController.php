<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function leavetable()
    {
        $leaves=Leave::with('user')->get();

        return view('leavetable',compact('leaves'));
    }
    public function dashboard()
    {
        // Fetch today's date
       $today = Carbon::today();

        // Retrieve today's attendance records with related user data
        $TodayLeaves = Leaves::with('user')
            ->whereDate('created_at', $today)
            ->get();

        // Count the number of attendance records
        $leaveCount = $TodayLeaves->count();

        // Return the view with today's attendance data and count
        return view('dashboard', compact('TodayLeaves', 'leaveCount'));
    }
   
   public function getMonthlyPermission(Request $request)
    {
        // Get the month and year from the request, or use the current month/year
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        $leave = Leave::with('user') // Ensure you have a relationship defined in the Attendance model
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->get();

        // Group by user and count attendance
        $leaveCount = $leave->groupBy('user_id')->map(function ($records) {
            return [
                'count' => $records->count(),
                'created_at' => $records->pluck('check_in_time'),
                'user_name' => $records->first()->user->name, 
            ];
        });

        return view('report', compact('leaveCount', 'month', 'year'));
    }
}
