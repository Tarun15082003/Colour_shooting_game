<?php
session_start();

$cid = $_POST['alu_id'];
 $conn = new mysqli("localhost:3307","root","","mini_project");
    if($conn->connect_error){
    	die("connection failed".$conn->connect_error."\n");
        exit();
    }
    $sql = "Select Company_id from company where Company_name = '$cid'";
    $result = $conn->query($sql);
    if($result->num_rows >0){
     		while($row = $result->fetch_assoc()){
     			$c_name=$row['Company_id'];
     		}
     $sql = "Select Student_id from placed_students where Company_id = '$c_name'";
    $result = $conn->query($sql);     
    if($result->num_rows > 0){
     echo "<table style='border-collapse: collapse;'>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Student_id" . "</td>";
    /*echo "<td style='border: 1px solid black; padding: 5px;'>" . "first_name" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "last_name" . "</td>";*/
     		while($row = $result->fetch_assoc()){
        echo '</tr>';
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Student_id'] . "</td>";
        /*echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['First_name'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Last_name'] . "</td>";*/
     		}
    }else{
    	echo "No one placed in this Company so far";
    }
    }else{
    	echo "This Company didn't come to our college so far";
    }
  $conn->close();
?>