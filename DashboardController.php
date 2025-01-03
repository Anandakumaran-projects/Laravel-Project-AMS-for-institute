<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\Attendance;
use App\Permission;
use App\Leave;
use App\User;
use App\Student;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(): \Illuminate\View\View
{
    // Fetch necessary data for the dashboard
    $totalUsers = User::count();
    $totalStudents = Student::count();
    $totalLeaves = Leave::count();
    $totalPermissions = Permission::count();
    $totalAttendance = Attendance::count();

    // Get today's attendance records
    $attendanceRecords = Attendance::with('user')
        ->whereDate('created_at', Carbon::today())
        ->get();

    // Get today's counts
    $todayAttendanceCount = $attendanceRecords->count();
    $todayPermissionCount = Permission::whereDate('created_at', Carbon::today())->count();
    $todayLeaveCount = Leave::whereDate('created_at', Carbon::today())->count();

    // Return the dashboard view with data
    return view('dashboard',compact(
        // 'totalUsers' => $totalUsers,
        // 'totalStudents' => $totalStudents,
        // 'totalLeaves' => $totalLeaves,
        // 'totalPermissions' => $totalPermissions,
        // 'totalAttendance' => $totalAttendance,
        // 'todayAttendanceCount' => $todayAttendanceCount,
        // 'todayPermissionCount' => $todayPermissionCount,
        // 'todayLeaveCount' => $todayLeaveCount,
        // 'attendanceRecords' => $attendanceRecords,
        'totalUsers',
        'totalStudents',
        'totalLeaves',
        'totalPermissions',
        'totalAttendance',
        'todayAttendanceCount',
        'todayPermissionCount',
        'todayLeaveCount',
        'attendanceRecords'
    ));
}
}
?>