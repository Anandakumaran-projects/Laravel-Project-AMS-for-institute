@include('header')
<main>
	<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Students Details</li>
            </ol>
        </nav>
        <h5 style="color:#ED0049">Student List</h5>
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Course Name</th>
                <th>Joining Date</th>
                </tr>
            </thead>
            <tbody>
               @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->dob)->format('d/m/Y') }}</td>
                    <td>{{ $student->cname }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->joiningdate)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>