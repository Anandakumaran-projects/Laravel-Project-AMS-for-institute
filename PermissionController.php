<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Carbon\Carbon;

class PermissionController extends Controller
{
     public function permissiontable()
    {
        $permissions=Permission::with('user')->get();

        return view('permissiontable',compact('permissions'));
    }
    public function dashboard()
    {
        // Fetch today's date
       $today = Carbon::today();

        // Retrieve today's attendance records with related user data
        $TodayPermissions = Permission::with('user')
            ->whereDate('created_at', $today)
            ->get();

        // Count the number of attendance records
        $permissionCount = $TodayPermissions->count();

        // Return the view with today's attendance data and count
        return view('dashboard', compact('TodayPermissions', 'permissionCount'));
    }
   
   public function getMonthlyPermission(Request $request)
    {
        // Get the month and year from the request, or use the current month/year
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        $permission = Permission::with('user') // Ensure you have a relationship defined in the Attendance model
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->get();

        // Group by user and count attendance
        $permissionCount = $permission->groupBy('user_id')->map(function ($records) {
            return [
                'count' => $records->count(),
                'created_at' => $records->pluck('check_in_time'),
                'user_name' => $records->first()->user->name, 
            ];
        });

        return view('report', compact('permissionCount', 'month', 'year'));
    }
}
