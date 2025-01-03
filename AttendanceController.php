<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /*public function index()
    {
        return view('attendancetable');
    }*/
    public function attendancetable()
    {
        $attendances=Attendance::with('user')->get();

        return view('attendancetable',compact('attendances'));
    }
    public function dashboard()
    {
        // Fetch today's date
       $today = Carbon::today();

        // Retrieve today's attendance records with related user data
        $TodayAttendances = Attendance::with('user')
            ->whereDate('created_at', $today)
            ->get();

        // Count the number of attendance records
        $attendanceCount = $TodayAttendances->count();

        // Return the view with today's attendance data and count
        return view('dashboard', compact('TodayAttendances', 'attendanceCount'));
    }
   
   public function getMonthlyAttendance(Request $request)
    {
        // Get the month and year from the request, or use the current month/year
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        $attendance = Attendance::with('user') // Ensure you have a relationship defined in the Attendance model
        ->whereYear('check_in_time', $year)
        ->whereMonth('check_in_time', $month)
        ->get();

        // Group by user and count attendance
        $attendanceCount = $attendance->groupBy('user_id')->map(function ($records) {
            return [
                'count' => $records->count(),
                'check_in_times' => $records->pluck('check_in_time'),
                'check_out_times' => $records->pluck('check_out_time'),
                'user_name' => $records->first()->user->name, 
            ];
        });

        return view('report', compact('attendanceCount', 'month', 'year'));
    }
}
