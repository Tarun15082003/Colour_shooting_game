<h1>
Placement Status  
</h1>

<?php
    session_start();
    $conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
    ini_set('display_errors', 1);
    error_reporting(-1);
    $id = $_SESSION['Student_id'];
    $sql = "SELECT * FROM student WHERE Student_id='$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $placed = $row['status'];
    if($placed == 0){
        echo "Not Placed" ;
    }
    else{
    $sql = "SELECT * FROM placed_students WHERE Student_id ='$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cid = $row['Company_id'];
    $sqlq = "SELECT * FROM company WHERE Company_id = '$cid' ";
    $resultq = mysqli_query($conn, $sqlq);
    $rowq = mysqli_fetch_assoc($resultq);
    echo "You are Placed" ;
    echo "<br>";
    echo "<br>";
     // Start the table
     echo "<table style='border-collapse: collapse;'>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Company_id" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Company_name" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Package" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Position" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Year" . "</td>";
     // Output the table body
     echo '<tbody>';
    
        echo '</tr>';
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Company_id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $rowq['Company_name'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Package'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Position'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['year'] . "</td>";
        echo '</tr>';

        echo '</tbody>';
        // End the table
        echo '</table>';
    }
?>