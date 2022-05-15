<?PHP
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './DBClass.php';
        try {
            $obj = new DBClass();
            $con = $obj->GetConn();
            $uname = $_POST['uname'];
            $pwd = $_POST['pwd'];
			
			echo "Uname : $uname <br>";
			echo "Pwd : $pwd";
			
			if($uname=="admin" && $pwd=="admin"){
				header("Location:dashboard.php");
			}
			else{
            $sql="Select * from customer where username = '$uname' and password like '$pwd'";
			echo $sql;
            $result = mysqli_query($con, $sql);
            echo "Affected Rows : ". mysqli_affected_rows($con)."<br>";
            if(mysqli_affected_rows($con)>0)
            {
                $row = mysqli_fetch_array($result);
                $custid = $row['CustomerId'];
                $_SESSION['custid'] = $custid;
                header("Location:CustomerDashboard.php");
            }
            else
            {
                //header("Location:index.php?msg=Invalid UserName and Password");
            }
			}
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        ?>
    </body>
</html>



