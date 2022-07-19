<?php

session_start();
if(!isset($_SESSION['username'])){
header('location:../../index.php');
}

?>

<?php
    require_once("Controller/connection.php");

    if ($_REQUEST['submit'] == 'Edit') {

        $id = $_GET['ID'];
        if(!empty($id)){
            $query = "select * from table_1 where id='".$id."'";
            $result = mysqli_query($con,$query);

            while($row=mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $name = $row['name'];
                $image = $row['image'];
                $price = $row['price'];
                $active = $row['active'];
            }

        }else{
            header("location:burger-table.php");
        }
        
    } else if ($_REQUEST['submit'] == 'Delete') {

        $id = $_GET['ID'];
        $query = "delete from table_1 where id='".$id."'";
        $result = mysqli_query($con,$query);
    
        if($result)
        {
            header("location:burger-table.php");
        }
        else
        {
            echo "please check your query";
        }
    } else {
        echo "invalid action!";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

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
            <p>Edit Item</p>
        </div>  
        <div class="form-body">
            <form action="Controller/update.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
            <label for="id">ID No.</label>
            <input type="text" id="id" name="id" value="<?php echo $id?>" disabled>

            <label for="food-name">Food Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name?>">

            <label for="image">Image</label>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="image" width="100px" height="100px">
            <input type="file" id="image" name="image">
            
            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?php echo $price?>">

            <label for="Price">Active</label>
            <select name="active" id="active">
                <option value="<?php echo $active?>"hidden><?php echo $active?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>
</body>
</html>