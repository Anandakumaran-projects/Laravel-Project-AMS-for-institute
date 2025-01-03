@include('header')
<main>
     <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">OverAll Attendance</li>
            </ol>
        </nav>
        <h5 style="color:#ED0049">Overall Attendance</h5>
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                </tr>
            </thead>
            <tbody>
              @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->check_in_time)->format('Y-m-d H:i:A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->check_out_time)->format('Y-m-d H:i:A') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
@include('footer')