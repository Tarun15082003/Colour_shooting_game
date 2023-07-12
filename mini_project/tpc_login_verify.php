<?php
// Start the session
session_start();
?>
<html>
    <body>
        <?php

            $id =  $_POST["id"];
            $pass = $_POST["password"];
            if($id =='TPC HEAD' AND $pass ="iitp@123"){
            echo 'Logged in successfully!';
        }
        ?>
        <br><br>
        <a href="tpc_welcome_page.php">Home</a>       
    </body>
</html>