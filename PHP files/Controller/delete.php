<?php
    require_once("connection.php");

    if(isset($_GET['Del']))
    {
        $id = $_GET['Del'];
        $query = "delete from table_1 where id='".$id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:../burger-table.php");
        }
        else
        {
            echo "please check your query";
        }
    }
    else
    {
        header("location:../burger-table.php");
    }
?>