<?php

session_start();


if($_SESSION['wrong_email'] = 1) {
	echo '
                
	<script>
	
		Swal.fire({
		icon: "error",
		title: "Oops...",
		text: "User Not Found ! Try again",
		});
	</script>
	';
	$_SESSION['wrong_email'] = null;
}else if($_SESSION['wrong_pass'] = 1) {
	echo '
                
	<script>
	
		Swal.fire({
		icon: "error",
		title: "Oops...",
		text: "Wrong Password ! Try again",
		});
	</script>
	';
	$_SESSION['wrong_pass'] = null;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Eastlink Customer Management</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./Asserts/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./Asserts/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./Asserts/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./Asserts/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./Asserts/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./Asserts/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./Asserts/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="./Asserts/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">	
			<div class="wrap-login100">
				<h1 class="headingssss"> East - <span style="color: red;">Link</span> Customer Management System</h1>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="./Asserts/Login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="./Db/login.php">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="submitUser">
							Login
						</button>
					</div>

					
				</form>
			</div>
            <br><br><br>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="./Asserts/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./Asserts/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="./Asserts/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./Asserts/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./Asserts/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="./Asserts/Login/js/main.js"></script>

</body>
</html>