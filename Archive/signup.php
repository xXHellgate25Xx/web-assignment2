<?php require_once './user.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<?php  
if (isset($_SESSION['signup_success'])) {
  echo "
        <script>
        $(document).ready(function(){
            $('#signUpSuccess').notify('show');
        });
    </script>
        ";
      unset($_SESSION['signup_success']);
      echo "
      <script>
          setTimeout(function(){window.location.replace('login.php');}, 1500);
      </script>
    ";
} 
else {
  unset($_SESSION['signup_success']);
}
?>


<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
    <div class="card-title mt-3 text-center">
    <div class="logo">
        <a href="index.php">
            <img src="images/logo_Acacy.svg" alt="error">
        </a>
    </div>
    </div>
    <div class="notify" id="Successful">
        <div class="card-title mt-3 text-center">
            <p> You have successfully signed up </p>
        </div>
    </div>
	<h4 class="card-title mt-3 text-center">Create Account</h4>
<form action=# method="POST" enctype="multipart/form-data">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="signup_username" class="form-control" placeholder="Username" type="text">
        <div><?php echo $signupUsernameError;?></div>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		</div>
        <input name="signup_fullname" class="form-control" placeholder="Full name" type="text">
        <div><?php echo $signupFullnameError;?></div>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="signup_email" class="form-control" placeholder="Email address" type="email">
        <div><?php echo $signupEmailError;?></div>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="signup_phone" class="form-control" placeholder="Phone number" type="text">
        <div><?php echo $signupPhoneError;?></div>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="signup_password" class="form-control" placeholder="Password" type="password">
        <div><?php echo $signupPasswordError;?></div>
    </div> <!-- form-group// -->                                
    <div class="form-group">
        <button name="btnSignup" type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

</body>

</html>