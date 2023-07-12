<?php
// Start the session
session_start();
?>
<html>
    <body>
        <?php

            $id =  $_POST["id"];
            $pass = $_POST["password"];
            
            $conn = new mysqli("localhost:3307","root","","mini_project");
            if($conn->connect_error){
                die("connection failed".$conn->connect_error."\n");
                exit();
            }
            ini_set('display_errors', 1);
            error_reporting(-1);
            $sql = "Select count(*) from company where Company_id ='$id' and Company_password='$pass'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row["count(*)"]==0)
            {
                echo 'Invalid user info. Please try again.';
                exit();
            }
            $sql="select Company_name,Company_email from company where Company_id='$id' and Company_password='$pass'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $_SESSION['cname'] = $row["Company_name"];
            $_SESSION['email'] = $row["Company_email"];
            $_SESSION['company_password'] = $pass;
            $_SESSION['id'] = $id;
            echo 'Logged in successfully!';
        ?>
        <br><br>
        <a href="company_welcome_page.php">Home</a>       
    </body>
</html>