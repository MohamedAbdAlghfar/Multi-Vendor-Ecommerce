<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Signin Form Template Example</title>
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

<body>
<div id="form">
  <div class="container">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
      <div id="userform">
        <ul class="nav nav-tabs nav-justified" role="tablist">
          <li class="active"><a href="#signup"  role="tab" data-toggle="tab">Sign up</a></li>
          <li><a href="#login"  role="tab" data-toggle="tab">Log in</a></li>
        </ul>







        {{-- sign up part --}}
        <div class="tab-content">
          <div class="tab-pane fade active in" id="signup">
            <h2 class="text-uppercase text-center"> Sign Up for Free</h2>
            {{--  --}}
            <form id="signup" action="signup" method="POST">
              @csrf
              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                    <label>First Name<span class="req">*</span> </label>
                    <input type="text" class="form-control" name="F_Name" id="f_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                    <label> Last Name<span class="req">*</span> </label>
                    <input type="text" class="form-control" name="L_Name" id="l_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Your Email<span class="req">*</span> </label>
                <input type="email" class="form-control" name="Email" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label> Your gender<span class="req">*</span> </label>
                <input type="text" class="form-control" name="Gender" id="gender" required data-validation-required-message="your gender" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              {{--  --}}
              <div class="form-group">
                <label>Address<span class="req">*</span> </label>
                <input type="text" class="form-control" name="Address" id="Address" required data-validation-required-message="your gender" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              {{--  --}}
              <div class="form-group">
                <label> Your Phone<span class="req">*</span> </label>
                <input type="tel" class="form-control" name="Phone" id="phone" required data-validation-required-message="Please enter your phone number." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label> Password<span class="req">*</span> </label>
                <input type="password" class="form-control" name="Password" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label>Confirm Password<span class="req">*</span> </label>
                <input type="password" class="form-control" name="Conf_Password" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="mrgn-30-top">
                <button type="submit" class="btn btn-larger btn-block">
                Sign up
                </button>
              </div>
            </form>
          </div>






          {{-- login part --}}
          <div class="tab-pane fade in" id="login">
            <h2 class="text-uppercase text-center"> Log in</h2>
            <form id="login" action="signup" method="POST">
              <div class="form-group">
                <label> Your Email<span class="req">*</span> </label>
                <input type="email" name="Email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label> Password<span class="req">*</span> </label>
                <input type="password" name="Password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                <p class="help-block text-danger"></p>
              </div>
              <div class="mrgn-30-top">
                <button type="submit" class="btn btn-larger btn-block">
                Log in
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container --> 
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
<!-- partial -->
  <script  src="js/script.js"></script>

</body>
</html>
