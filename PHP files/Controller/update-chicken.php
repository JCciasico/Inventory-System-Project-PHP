<?php
    require_once("connection.php");

    if(isset($_POST["update"])){

        if(!empty($_FILES['image']['name'])){
            $filename = basename($_FILES['image']['name']);
            $fileType = pathinfo($filename,PATHINFO_EXTENSION);

            $allowTypes = array('jpg','png','jpeg','webp');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
        
                $id = $_GET['id'];
                $name = $_POST['name'];
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
                $price = $_POST['price'];
                $active = $_POST['active'];

                $query = "update table_2 set name = '".$name."',image = '".$imgContent."',price = '".$price."',active = '".$active."' where id='".$id."'";
                $result = mysqli_query($con,$query);


                if($result){
                    header("location:../chicken-table.php");
                }else{
                    echo'<script>alert("Upload Failed")</script>';
                    echo '<script>window.location="../edit-chicken.php"</script>';                 
                }
            }else{
                echo'<script>alert("Invalid Image Format")</script>';
                echo '<script>window.location="../edit-chicken.php"</script>'; 
            }
        }else{

            $id = $_GET['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $active = $_POST['active'];

            $query = "update table_2 set name = '".$name."',price = '".$price."',active = '".$active."' where id='".$id."'";
            $result = mysqli_query($con,$query);

            header("location:../chicken-table.php");

        }
    }
?>