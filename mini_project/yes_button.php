
<html>
    <body>
        <?php
            session_start();
            $student_id = $_POST['student_id'];
            $conn = new mysqli("localhost:3307","root","","mini_project");
            $pos = $_POST['pos'];
            $sal = $_POST['sal'];
            $id = $_SESSION['id'];            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
             $sql = "INSERT INTO old_notifi VALUES ('$student_id', '$id')";
            $result = $conn->query($sql);
            $sql = "INSERT INTO offers VALUES ('$student_id', $sal ,'$pos' ,'$id')";
            $result = $conn->query($sql);
       
            if ($result) {
                echo "Invitation Sent Successfully";
            } 
            
            $sql = "DELETE FROM new_notifications WHERE Student_id = '$student_id' AND Company_id = '$id'";
            $result = $conn->query($sql);
            
            $conn->close();
        ?>

        <br><br>
        <a href="new_company_notifi.php">Go Back</a>       
    </body>
</html>
