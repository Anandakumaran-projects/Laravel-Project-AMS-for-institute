@include('header')
<main>
		<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Student</li>
            </ol>
        </nav>
        <div class="register-container">
         @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
		<form action="{{route('student.store')}}" method="POST">
      @csrf
		
			<h3 style="color:#ED0049">Add Student</h3>
			<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-user-24.png"></span>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="name">
    <label for="floatingInputGroup1">Enter Username</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-email-24.png"></span>
  <div class="form-floating">
    <input type="email" class="form-control" id="floatingInputGroup1" placeholder="Email" name="email">
    <label for="floatingInputGroup1">Enter Email Address</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-phone-24.png"></span>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Phone" name="phone">
    <label for="floatingInputGroup1">Enter Mobile Number</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-address-24.png"></span>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Address" name="address">
    <label for="floatingInputGroup1">Enter Residential Address</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-male-24.png"></span>
  <div class="form-floating">
    <select class="form-control" id="floatingInputGroup1" placeholder="Password" name="gender">
      <option value="select">Select</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="others">Others</option>
    </select>
    <label for="floatingInputGroup1">Select Gender</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-date-24.png"></span>
  <div class="form-floating">
    <input type="date" class="form-control" id="floatingInputGroup1" placeholder="Password" name="dob">
    <label for="floatingInputGroup1">Date Of Birth</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-study-24.png"></span>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Address" name="cname">
    <label for="floatingInputGroup1">Enter Course Name</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-date-24.png"></span>
  <div class="form-floating">
    <input type="date" class="form-control" id="floatingInputGroup1" placeholder="Password" name="joiningdate">
    <label for="floatingInputGroup1">Joining Date</label>
  </div>
</div>
<button type="submit" name="submit" class="button">
  <span>Submit</span>
</button>
</form>
@method('GET')
</div>
</main>
@include('footer')