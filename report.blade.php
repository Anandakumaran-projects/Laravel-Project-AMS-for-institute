@include('header')
<main>
	<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Report</li>
            </ol>
        </nav>
	<h2>Monthly Attendance for {{ $month }}/{{ $year }}</h2>
        <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
             <thead>
            <tr>
                <th>Student Name</th>
                <th>Present</th>
                <th>CheckIn</th>
                <th>Permission</th>
                <th>P.Reason</th>
                <th>Leave</th>
                <th>L.Reason</th>
            </tr>
        </thead>
        <tbody>
            @if(empty($attendanceCount))
                <tr>
                    <td colspan="4">No attendance records found for this month.</td>
                </tr>
            @else
                @foreach($attendanceCount as $userId => $data)
                    <tr>
                        <td>{{ $data['user_name'] }}</td>
                        <td>{{ $data['check_in_count'] }}</td>
                        <td>
                            <ul>
                                @foreach($data['check_in_times'] as $checkIn)
                                    <li>{{ \Carbon\Carbon::parse($checkIn)->format('Y-m-d H:i:s') }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ isset($data['permissions']) ? count($data['permissions']) : 0 }}</td>
                        <td>
                            <ul>
                                @if(isset($data['permissions']) && count($data['permissions']) > 0)
                                    @foreach($data['permissions'] as $permission)
                                        <li>{{ $permission['date'] }} - {{ $permission['reason'] }}</li>
                                    @endforeach
                                @else
                                    <li>No permissions</li>
                                @endif
                            </ul>
                        </td>
                        <td>{{ isset($data['leaves']) ? count($data['leaves']) : 0 }}</td>
                        <td>
                            <ul>
                                @if(isset($data['leaves']) && count($data['leaves']) > 0)
                                    @foreach($data['leaves'] as $leave)
                                        <li>{{ $leave['date'] }} - {{ $leave['reason'] }}</li>
                                    @endforeach
                                @else
                                    <li>No leave</li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        </table>
    </div>
</main>