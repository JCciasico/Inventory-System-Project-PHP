<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $active = $_POST['active'];

    //connection
    $conn = new mysqli('localhost','root','','stock_db');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{

        if(isset($_POST["submit"])){

            if(!empty($_FILES['image']['name'])){
                $filename = basename($_FILES['image']['name']);
                $fileType = pathinfo($filename,PATHINFO_EXTENSION);

                $allowTypes = array('jpg','png','jpeg','webp');
                if(in_array($fileType,$allowTypes)){
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));

                    $stmt = $conn->prepare("insert into table_2 (id,name,image,price,active) values (?,?,'$imgContent',?,?)");
                    $stmt->bind_param("isds",$id,$name, $price, $active);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    
                    header("location:../chicken-table.php");

                    if($stmt){
                        echo'<script>alert("Success")</script>';
                    }else{
                        echo'<script>alert("Upload Failed")</script>';
                        echo '<script>window.location="../add-chicken.php"</script>';                 
                    }
                }else{
                    echo'<script>alert("Invalid Image Format")</script>';
                    echo '<script>window.location="../add-chicken.php"</script>'; 
                }
            }else{
                echo'<script>alert("Select an Image")</script>';
                echo '<script>window.location="../add-chicken.php"</script>'; 
            }
        }
    }
?>
