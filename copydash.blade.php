@include('header')
<main>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <!-- Main content can go here -->
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><img src="icons8-attendance-48.png" class="image">Attendance</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Today</h6>
                    <p class="card-text"></p>
                    <!-- <a href="#" class="card-link">View</a> -->
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><img src="icons8-student-48.png" class="image">Students</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Total</h6>
                    <p class="card-text"></p>
                    <!-- <a href="#" class="card-link">View</a> -->
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><img src="icons8-permission-48.png" class="image">Permission</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Today</h6>
                    <p class="card-text"></p>
                    <!-- <a href="#" class="card-link">View</a> -->
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><img src="icons8-leave-48.png" class="image">Leave</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Today</h6>
                    <p class="card-text"></p>
                    <!-- <a href="#" class="card-link">View</a> -->
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><img src="icons8-register-48.png" class="image">Registers</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Total</h6>
                    <p class="card-text"></p>
                    <!-- <a href="#" class="card-link">View</a> -->
                </div>
            </div>
        </div>
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
            @foreach($attendanceRecords as $record)
                <tr>
                    <td>{{ $record->user->name }}</td>
                    <td>{{ $record->check_in_time }}</td>
                    <td>{{ $record->check_out_time }}</td>
                </tr>
                @endforeach
                @if($attendanceRecords->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">No attendance records for today.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    </main>
    @include('footer')