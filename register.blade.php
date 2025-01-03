@include('header')
	<main>
    
		<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>
		<form action="{{url('/register')}}" method="POST">
      @csrf
		<div class="register-container">
			<h2 style="color:#ED0049">Register</h2>
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
  <span class="input-group-text"><img src="icons8-password-24.png"></span>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingInputGroup1" placeholder="Password" name="password">
    <label for="floatingInputGroup1">Enter Password</label>
  </div>
</div>
<div class="input-group mb-3">
  <span class="input-group-text"><img src="icons8-validation-24.png"></span>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingInputGroup1" placeholder="Password" name="password_confirmation">
    <label for="floatingInputGroup1">Confirm Password</label>
  </div>
</div>
<button type="submit" class="button">
  <span>Submit</span>
</button>
		</div>
	</form>
  <br>
  <br>
  <br>
	</main>
@include('footer')