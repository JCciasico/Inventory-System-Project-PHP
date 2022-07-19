<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'userinfo');

$username = $_POST['username'];
$password = $_POST['password'];

$s = "select * from userdata where username = '$username' && password='$password'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if ($num == 1) {
	$_SESSION['username'] = $username;
	header("location:../home.php");
	exit();
}else{	
	echo '<script>alert("Wrong Password")</script>';  
    echo '<script>window.location="../../index.php"</script>'; 
}


?>