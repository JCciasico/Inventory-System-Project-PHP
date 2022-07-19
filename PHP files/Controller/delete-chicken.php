<?php
    require_once("connection.php");

    if(isset($_GET['Del']))
    {
        $id = $_GET['Del'];
        $query = "delete from table_2 where id='".$id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:../chicken-table.php");
        }
        else
        {
            echo "please check your query";
        }
    }
    else
    {
        header("location:../chicken-table.php");
    }
?>