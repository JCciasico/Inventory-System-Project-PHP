<?php

    session_start();
    if(!isset($_SESSION['username'])){
    header('location:../../index.php');
    }

?>

<?php
if(isset($_POST['reset']))
{
    require("Controller/connection.php");
    $query =  "select * from table_2";
    $result = mysqli_query($con,$query);
}
?>

<?php

if(isset($_POST['searchfil']))
{
    $search = $_POST['search']; 
    // search in all table columns
    // using concat mysql function
    $query = "select * from table_2 where concat(`id`, `name`, `image`, `price`, `active`) LIKE '%".$search."%'";
    $result = filterTable($query);
    
}
 else {
    $query = "select * from table_2";
    $result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    require("Controller/connection.php");
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger</title>

    <!-- CSS link -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <script>
        function onlyOne(checkbox) {
            var checkboxes = document.getElementsByName('ID')
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false
            })
        }
    </script>
    <div class="profile-nav">
        <h4>Hello, <?php echo $_SESSION['username'];?></h4>
        <a href="home.php">Home</a>
        <a href="Controller/logout.php">Logout</a>    
    </div>
    <div class="ctable-body">
	    <div class="categories">
            <a href="burger-table.php"class="choice-box burger1">
                <p>Flame Grilled Burger</p>
            </a>
            <a href="chicken-table.php"class="choice-box chicken1">
                <p>Chicken Burger</p>
            </a>
        </div>

        <div class="search-bar">
            <form action="chicken-table.php" method="POST" class="search-form">
                <input type="text" id="search" placeholder="Search Item Here.." name="search">
                <!-- <a href="" id="search-btn"><img src="https://img.icons8.com/fluency-systems-filled/48/000000/google-web-search.png"/></a> -->
                <input type="submit" id="fil-btn" name="searchfil" value="Filter">
                <input type="submit" id="reset-btn" name="reset" value="Reset">
            </form>
            <?php
                require("Controller/connection.php");
                $query =  "select count(*) from table_2";
                $database_count = mysqli_query($con,$query);
                $DuetiesDesc = array();
                $database_count=mysqli_fetch_assoc($database_count);
            ?>
            <?php
                require("Controller/connection.php");
                $query =  "select count(*) from table_2 where active = 'Yes'";
                $database_active = mysqli_query($con,$query);
                $DuetiesDesc = array();
                $database_active=mysqli_fetch_assoc($database_active);
            ?>
            
            <div class="dashboard">
                <p>All Items: <span id="total-items"><?php echo $database_count['count(*)']?></span></p>
                <p>Actives: <span id="total-actives"><?php echo $database_active['count(*)']?></span></p>
            </div>
            <div class="sample"></div>
        </div>

        <form action="edit-chicken.php" method="GET" class="table-form"> 

            <div class="table-box"> 
                    <table class="content-table" id="foods">
                    <!-- <p id="food-title">&nbsp;&nbsp;&nbsp;Food List</p> -->
                        <thead>
                            <tr class="text-bold">
                                <th>Select</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <?php
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $id = $row['id'];
                                $name = $row['name'];
                                $price = $row['price'];
                                $active = $row['active'];
                        ?>
                            <tbody>
                                <tr>
                                    <td id="check"><input type="checkbox" id="ID" name="ID" value="<?php echo $id?>" onclick="onlyOne(this)"></td>
                                    <td id="id-no"><?php echo $id?></td>
                                    <td><?php echo $name?></td>
                                    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="image" width="90px" height="80px"></td>
                                    <td>₱ <?php echo $price?></td>
                                    <td id="active-des"> <?php echo $active?></td>
                                </tr>
                            </tbody>
                        <?php
                            }
                        ?>
                    </table>
                    <div class="action-panel">
                        <div class="add">
                        <p id="food-title1">Action</p>
                            <a href="add-chicken.php" class="btn">
                            Add</a>
                            <input type="submit" name="submit" value="Edit" class="btn" id="btn">
                            <input type="submit" name="submit" value="Delete" class="btn" id="btn1">

                                    <!-- <a href="Javascript:someFunction()" class="btn">
                                        Edit
                                    </a>
                                    <a href="#" class="btn">
                                        Delete
                                    </a> -->
                        </div> 
                    </div>
                    
            </div>
        </form>
        <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
        </script>
</body>
</html>