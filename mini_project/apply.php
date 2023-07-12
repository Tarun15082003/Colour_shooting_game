<h1>
Companies  
</h1>
<?php
    session_start();
    $conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
    $id = $_SESSION['Student_id'];
    $cgpa = $_SESSION['CGPA'];
    $sql2 = "SELECT * FROM offers WHERE Student_id='$id' order by Package DESC LIMIT 1 ";
    $result2 = mysqli_query($conn, $sql2);
    $placed = -1;
    if (mysqli_num_rows($result2) == 1){
        $row2 = mysqli_fetch_assoc($result2);
        $placed = $row2['Package'];
    }
    $sql = "SELECT Company_id,Position,Salary FROM position WHERE CGPA <= '$cgpa' and Salary >= '$placed'";
    $result = mysqli_query($conn, $sql);
    // Start the table
    echo "<table style='border-collapse: collapse;'>";
    echo "<td style='border: 1px solid black; padding: 5px;'>" . "Company_id" . "</td>";
    echo "<td style='border: 1px solid black; padding: 5px;'>" . "Company_name" . "</td>";
    echo "<td style='border: 1px solid black; padding: 5px;'>" . "Position" . "</td>";
    echo "<td style='border: 1px solid black; padding: 5px;'>" . "Salary" . "</td>";
    echo "<td style='border: 1px solid black; padding: 5px;'>" . "Apply" . "</td>";
    // Output the table body
    echo '<tbody>';

    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $temp = $row['Company_id'];
            $sql1 = "SELECT Company_name FROM company WHERE Company_id = $temp ";
            $result1 = mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
            echo '</tr>';
            echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Company_id'] . "</td>";
            echo "<td style='border: 1px solid black; padding: 5px;'>" . $row1['Company_name'] . "</td>";
            echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Position'] . "</td>";
            echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Salary'] . "</td>";
            echo "<td style='border: 1px solid black; padding: 5px;'>" . '<form action="after_apply.php" method="post"> <input type="hidden" name="cid" value="'. $row['Company_id'] .'"> <input type="hidden" name="pos" value="'. $row['Position'] .'"> <input type="hidden" name="sal" value="'. $row['Salary'] .'"> <button type="submit" name="details"  onclick="alert(\'Are you sure to apply ' . $id . '\')"> <a href="after_apply.php"> <action="after_apply.php">Click</button>  </form>' . "</td>";
            echo '</tr>';
        }
    }
    echo '</tbody>';
    // End the table
    echo '</table>';

    /*$row = mysqli_fetch_assoc($result);
    foreach ($row as $row_data){
        $temp = $row_data['Company_id'];
        $sql1 = "SELECT Company_name FROM company WHERE Company_id = $temp ";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $cid = $row_data['Company_id'];
        $cname = $row1['Company_name'];
        $pos = $row_data['Position'];
        $sal = $row_data['Salary'];
        $sql3 = "INSERT into temp1 values ('$cid','$cname','$pos','$sal') ";
        $result3 = mysqli_query($conn,$sql3);

    }*/

    /*$query = "SELECT * FROM temp1 " ;
    $query_result=mysqli_query($conn,$query);

     // Start the table
     echo "<table style='border-collapse: collapse;'>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Company_id" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Company_name" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Position" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Salary" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Apply" . "</td>";
     // Output the table body
     echo '<tbody>';
    
     while ($query_row = mysqli_fetch_assoc($query_result)){
        echo '</tr>';
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['Company_id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['Comapny_name'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['Position'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $query_row['Salary'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . '<form action="after_apply.php" method="post"> <input type="hidden" name="cid" value="'. $query_row['Company_id'] .'"> <input type="hidden" name="pos" value="'. $query_row['Position'] .'"> <input type="hidden" name="sal" value="'. $query_row['Salary'] .'"> <button type="submit" name="details"  onclick="alert(\'Are you sure to apply ' . $id . '\')"> <a href="after_apply.php"> <action="after_apply.php">Click</button>  </form>' . "</td>";
        echo '</tr>';
     }

        echo '</tbody>';
        // End the table
        echo '</table>';*/

?>