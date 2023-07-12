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
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Resume" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "To be placed" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Not to be placed" . "</td>";
     // Output the table body
     echo '<tbody>';
     $id=$_SESSION['id'];
  //   echo "$id";
      $sql="select Student_id,Position,Salary from new_notifications where Company_id='$id'";
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
        echo "<td style='border: 1px solid black; padding: 5px;'>" . '<form action="view_resume_comp.php" method="post"> <input type="hidden" name="id" value="'. $query_row['Student_id'] .'">  <button type="submit" name="cred"  > View Resume </button>  </form>' . "</td>";

echo "<td style='border: 1px solid black; padding: 5px;'>" . '<form action="yes_button.php" method="post"> <input type="hidden" name="pos" value="'. $row['Position'] .'"> <input type="hidden" name="sal" value="'. $row['Salary'] .'">
<button type="submit" name="student_id" value="' . $query_row['Student_id'] . '" onclick="return confirm(\'Are you sure that you want to invite ' . $query_row['first_name'] . ' ' . $query_row['last_name'] . '?\')">YES</button>
</form>' . "</td>";

echo "<td style='border: 1px solid black; padding: 5px;'>" . '<form action="no_button.php" method="post">
<button type="submit" name="student_id" value="' . $query_row['Student_id'] . '" onclick="return confirm(\'Are you sure that you are not want to invite ' . $query_row['first_name'] . ' ' . $query_row['last_name'] . '?\')">NO</button>
</form>' . "</td>";
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