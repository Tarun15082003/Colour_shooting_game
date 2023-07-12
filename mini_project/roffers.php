<h1>
Recieved Offers  
</h1>

<?php
    session_start();
    $conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
    ini_set('display_errors', 1);
   error_reporting(-1);
    $id = $_SESSION['Student_id'];
    $sql = "SELECT * FROM offers WHERE Student_id='$id' ";
    $result = mysqli_query($conn, $sql);
     // Start the table
     echo "<table style='border-collapse: collapse;'>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Company_id" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Package" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Position" . "</td>";
     echo "<td style='border: 1px solid black; padding: 5px;'>" . "Accept" . "</td>";
     // Output the table body
     echo '<tbody>';
    
     while ($row = mysqli_fetch_assoc($result)){
        echo '</tr>';
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Company_id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Package'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Position'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . ' <form action="placed.php" method="post"> <input type="hidden" name="cid" value="'. $row['Company_id'] .'"> <input type="hidden" name="pos" value="'. $row['Position'] .'">  <input type="hidden" name="sal" value="'. $row['Package'] .'"> <button type="submit" name="details" onclick="alert(\'Are you sure to accept the offer ' . $id . '\')"> <a href="placed.php"> <action="placed.php">Click</button>' . "</td>";
        echo '</tr>';
     }

        echo '</tbody>';
        // End the table
        echo '</table>';

?>