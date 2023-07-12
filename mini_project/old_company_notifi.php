<?php
 session_start();
?>
<?php
// Start the table
                 $conn = new mysqli("localhost:3307","root","","mini_project");
            if($conn->connect_error){
                die("connection failed".$conn->connect_error."\n");
                exit();
            }
     echo "<table style='border-collapse: collapse;'>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Student_id" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "first_name" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "last_name" . "</td>";
    // echo "<td style='border: 1px solid black; padding: 5px;'>" . "Resume" . "</td>";
     // Output the table body
     echo '<tbody>';
     $id=$_SESSION['id'];
  //   echo "$id";
      $sql="select Student_id from old_notifi where Company_id='$id'";
      $result = $conn->query($sql);
      if($result->num_rows>0){
     while ($row = $result->fetch_assoc()){
        $student_id = $row["Student_id"];
        $sql = "SELECT * FROM student WHERE Student_id='$student_id'";
     $student_result = $conn->query($sql);
    while($query_row = $student_result->fetch_assoc()){  
        echo '</tr>';
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['Student_id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['first_name'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['last_name'] . "</td>";
     //   echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['resume'] . "</td>";
     }
 }
 }

        echo '</tbody>';
        // End the table
        echo '</table>';
        $conn->close();
    ?>

   <html>
   <body>
    <br><br>
        <a href="company_welcome_page.php">Dashboard</a>
   </body>
   </html>