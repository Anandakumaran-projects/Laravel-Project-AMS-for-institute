<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Permission;
use App\Leave;

class ReportController extends Controller
{
    public function showReport(Request $request)
    {
        // Fetch the month and year from the request or set default values
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Fetch attendance data grouped by user_id for the specified month and year
        $attendanceCount = Attendance::whereMonth('created_at', $month)
                                     ->whereYear('created_at', $year)
                                     ->get()
                                     ->groupBy('user_id');

        // Prepare attendance data
        $attendanceData = [];
        foreach ($attendanceCount as $userId => $attendances) {
            $attendanceData[$userId] = [
                'user_name' => $attendances->first()->user->name, // Assuming you have a user relationship
                'check_in_times' => $attendances->pluck('created_at')->toArray(),
                'check_in_count' => $attendances->count(), // Count of check-ins
            ];
        }

        // Fetch permission data grouped by user_id for the specified month and year
        $permissions = Permission::whereMonth('created_at', $month)
                                 ->whereYear('created_at', $year)
                                 ->get()
                                 ->groupBy('user_id');

        // Prepare permission data
        foreach ($permissions as $userId => $userPermissions) {
            if (isset($attendanceData[$userId])) {
                $attendanceData[$userId]['permissions'] = $userPermissions->map(function ($permission) {
                    return [
                        'date' => $permission->created_at->toDateString(), // Format the date
                        'reason' => $permission->reason, // Assuming you have a reason field
                    ];
                })->toArray();
            } else {
                // If the user has permissions but no attendance, create an entry for them
                $attendanceData[$userId] = [
                    'user_name' => $userPermissions->first()->user->name, // Assuming you have a user relationship
                    'check_in_times' => [],
                    'check_in_count' => 0, // No attendance
                    'permissions' => $userPermissions->map(function ($permission) {
                        return [
                            'date' => $permission->created_at->toDateString(),
                            'reason' => $permission->reason,
                        ];
                    })->toArray(),
                ];
            }
        }
         $totalPermissionsCount = 0;
    foreach ($attendanceData as $userData) {
        if (isset($userData['permissions'])) {
            $totalPermissionsCount += count($userData['permissions']);
        }
    }

    //leave data get
    $leaves = Leave::whereMonth('created_at', $month)
                                 ->whereYear('created_at', $year)
                                 ->get()
                                 ->groupBy('user_id');

        // Prepare leave data
        foreach ($leaves as $userId => $userLeaves) {
            if (isset($attendanceData[$userId])) {
                $attendanceData[$userId]['leaves'] = $userLeaves->map(function ($leave) {
                    return [
                        'date' => $leave->created_at->toDateString(), // Format the date
                        'reason' => $leave->reason, // Assuming you have a reason field
                    ];
                })->toArray();
            } else {
                // If the user has permissions but no attendance, create an entry for them
                $attendanceData[$userId] = [
                    'user_name' => $userLeaves->first()->user->name, // Assuming you have a user relationship
                    'check_in_times' => [],
                    'check_in_count' => 0, // No attendance
                    'leaves' => $userLeaves->map(function ($permission) {
                        return [
                            'date' => $leave->created_at->toDateString(),
                            'reason' => $leave->reason,
                        ];
                    })->toArray(),
                ];
            }
        }
         $totalLeavesCount = 0;
    foreach ($attendanceData as $userData) {
        if (isset($userData['leaves'])) {
            $totalLeavesCount += count($userData['leaves']);
        }
    }

        // Return the view with the combined data
        return view('report', [
            'attendanceCount' => $attendanceData,
            'month' => $month,
            'year' => $year,
        ]);
    }
}
