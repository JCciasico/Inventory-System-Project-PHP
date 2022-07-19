<?php
	
	session_start();
	if(!isset($_SESSION['username'])){
    header('location:../../index.php');
	}
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>


	<!-- CSS link -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="profile-nav">
		<h4>Hello, <?php echo $_SESSION['username'];?></h4>
		<a href="Controller/logout.php">Logout</a>
	</div>
	<div class="cont-body">
		<h2>Bhorgehr Inventory System</h2>
		
		<div class="home-container">
			<div class="container-box">
					<a href="burger-table.php">
						<div class="img-box1">
						</div>
					</a>
					<p>Foods</p>
			</div>
			<div class="container-box">
					<a href="sales-table.php">
						<div class="img-box2">
						</div>
					</a>
					<p>Sales</p>
			</div>
		</div>

	</div>
	

</body>
</html>