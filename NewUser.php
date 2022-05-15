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
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO Customer(CustomerName, EmailId, UserName, Password) VALUES('$name','$email','$username','$password')";
            echo $sql;
            
            //$result = $conn->query($sql);
            if ($conn->query($sql) == TRUE) {
                header("Location:index.php?msg=Customer Added Success");
            } else {
                header("Location:index.php?msg=Customer Not Added");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        ?>
    </body>
</html>
