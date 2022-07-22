<?php

		session_start();
		if(isset($_SESSION['username'])){
	    header('location:PHP files/home.php');
		}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>


	<!-- CSS link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="profile-nav">
		<h4>Bhorgehrs Inventory System</h4>
	</div>
	<div class="cont-body">
		<div class="container" id="container">
			<div class="form-container sign-in-container">
				<form action="PHP files/Controller/validate.php" method="POST">
					<h1>Login</h1>
					<input type="username" name="username" placeholder="Username"  />
					<input type="password" name="password" placeholder="Password"  />
					<a href="#">Forgot your password?</a>
					<button type="submit">Login</button>
				</form>
			</div>
			<div class="form-container sign-up-container">
				<form action="PHP files/Controller/registration.php" method="POST">
					<h1>Create Account</h1>
					<input type="username" name="username" placeholder="Username" required />
					<input type="email" name="email" placeholder="Email" required />
					<input type="password" name="password" placeholder="Password" required />
					<button type="submit">Sign Up</button>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Hello, and welcome back!</h1>
						<p>Please login with your personal information to stay connected with us.</p>
						<button class="ghost" id="signIn">Sign In</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Dont have an account?</h1>
						<p>Fill in your personal information to begin your adventure with us.</p>
						<button class="ghost" id="signUp">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>

</body>
</html>