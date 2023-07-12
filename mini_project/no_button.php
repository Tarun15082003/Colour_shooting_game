<?php
    session_start();
?>

<html>
    <body>
        <?php
            $student_id = $_POST['student_id'];
            $conn = new mysqli("localhost:3307","root","","mini_project");
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
            
            $id = $_SESSION['id'];
            $sql = "INSERT INTO old_notifi VALUES ('$student_id', '$id')";
            $result = $conn->query($sql);            
            $sql = "DELETE FROM new_notifications WHERE Student_id = '$student_id' AND Company_id = '$id'";
            $result = $conn->query($sql);
                        if ($result) {
                echo "Invitation not Sent ";
            } 
            $conn->close();
        ?>

        <br><br>
        <a href="new_company_notifi.php">Go Back</a>       
    </body>
</html>