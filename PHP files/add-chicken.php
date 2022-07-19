<?php

session_start();
if(!isset($_SESSION['username'])){
header('location:../../index.php');
}

?>
<?php
    require_once("Controller/connection.php");  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="profile-nav">
        <h4>Hello, <?php echo $_SESSION['username'];?></h4>
        <a href="home.php">Home</a>
        <a href="Controller/logout.php">Logout</a>
    </div>
    <div class="ctable-body">
        <div class="edit-title">
            <p>Add New Food</p>
        </div>  
        <div class="form-body">
            <?php
                $random = rand(2000,2999);
            ?>
            <form action="Controller/insert-chicken.php" method="POST" enctype="multipart/form-data">
            <label for="id">ID No.</label>
            <input type="text" id="id" name="id" value="<?php echo $random?>" disabled>
            <input type="hidden" id="id" name="id" value="<?php echo $random?>">

            <label for="food-name">Food Name</label>
            <input type="text" id="name" name="name" placeholder="Input Food Name">

            <label for="image">Image</label>
            <input type="file" id="image" name="image">

            <label for="Price">Price</label>
            <input type="text" id="price" name="price" placeholder="Input Price">

            <label for="Price">Active</label>
            <select name="active" id="active">
                <option value="none" selected hidden disabled>Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <input type="submit" id="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>


