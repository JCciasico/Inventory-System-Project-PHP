<?php
    require_once("Controller/sales-connection.php");
    $query =  "select * from sales_table";
    $result = mysqli_query($con,$query);
?>

<?php

    session_start();
    if(!isset($_SESSION['username'])){
    header('location:../../index.php');
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
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

</head>
<body>
    <script>
        function html_table_to_excel(type)
        {
            var data = document.getElementById('sales');

            var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

            XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

            XLSX.writeFile(file, 'sales.' + type);
        }
    </script>
    <script>
        function generatePDF(){
            const element = document.getElementById("sales");
            html2pdf()
            .from(element)
            .save();
        }
    </script>

    <div class="profile-nav">
        <h4>Hello, <?php echo $_SESSION['username'];?></h4>
        <a href="home.php">Home</a>
        <a href="Controller/logout.php">Logout</a>    
    </div>

    <div class="ctable-body">
	    <div class="sales-dash">
            <!-- <a href="#"class="export-box pdf">
                <p>Export to PDF</p>
            </a> -->
            <?php
                require("Controller/sales-connection.php");
                $query =  "select sum(total) as total from sales_table";
                $database_sum = mysqli_query($con,$query);
                $sum = mysqli_fetch_assoc($database_sum); 
            ?>
            <?php
                require("Controller/sales-connection.php");
                $query =  "select count(*) from sales_table";
                $database_count = mysqli_query($con,$query);
                $DuetiesDesc = array();
                $database_count=mysqli_fetch_assoc($database_count);
            ?>
            <div class="dashboard-box">
                <p>Total Orders: <?php echo $database_count['count(*)']?></p>
            </div>
            <div class="dashboard-box">
                    <p>Total Sales: ₱ <?php echo $sum['total']?></p>
            </div>
        </div>  
        <div class="table-box1">
                 <div class="add1">
                     <p id="food-title">Sales List</p>
                     <div class="export-div">
                        <a onclick="html_table_to_excel('xlsx')" class="btn1">
                        Export to Excel</a>
                        <a onclick="generatePDF()" class="btn2">
                        Export to PDF</a>
                     </div>
                </div> 

                <table id="sales" class="content-table1">
                    <tr>
                        <th>orderNo</th>
                        <th>Date Transaction</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Contact Number</th>
                        <th>Total</th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $orderNo = $row['orderNo'];
                            $date = $row['date'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $resaddress = $row['resaddress'];
                            $city = $row['city'];
                            $contact = $row['contact'];
                            $total = $row['total'];
                    ?>
                        <tr>
                            <td><?php echo $orderNo?></td>
                            <td><?php echo $date?></td>
                            <td><?php echo $fname?></td>
                            <td><?php echo $lname?></td>
                            <td><?php echo $resaddress?></td>
                            <td><?php echo $city?></td>
                            <td><?php echo $contact?></td>
                            <td><?php echo $total?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
        </div>
</body>
</html>

