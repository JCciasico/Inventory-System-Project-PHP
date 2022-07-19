<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'userinfo');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$s = "select * from userdata where username = '$username'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if ($num == 1) {
	echo "Username Already Taken";
}else{
	$reg = "insert into userdata(username,email,password) values ('$username','$email','$password')";
	mysqli_query($con,$reg);
	echo '<script>alert("Successfully Registered")</script>';  
	echo '<script>window.location="../../index.php"</script>';}
?>

<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            var image_name = $('#image').val();
            if(image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>