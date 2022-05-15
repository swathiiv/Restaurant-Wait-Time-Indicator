<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            include './DBClass.php';
            $obj = new DBClass();
            $conn = $obj->GetConn();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phnum = $_POST['phnum'];
            $txtDate = $_POST['txtDate'];
			$bookingtime = $_POST['bookingtime'];
			$custid=$_SESSION['custid'];
			

            $sql = "INSERT INTO Booking(CustomerId, CustomerName, EmailId, PhoneNum, BookingDate, BookingTime) VALUES('$custid','$name','$email',
			'$phnum','$txtDate','$bookingtime')";
            echo $sql;
            
            //$result = $conn->query($sql);
            if ($conn->query($sql) == TRUE) {
                header("Location:CustomerBooking.php?msg=Booking Done Success");
            } else {
                header("Location:CustomerBooking.php?msg=Booking Not Success");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        ?>
    </body>
</html>
