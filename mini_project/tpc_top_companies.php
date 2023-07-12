<?php
// Start the session
session_start();
?>
<html>
<body>
<?php
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "mini_project";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
        $sql="select Company_id,Package,Position from placed_students ORDER BY Package DESC LIMIT 3";
           $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $x = $row['Company_id'];
                	$sql = "Select * from company where Company_id = '$x' ";
                	$result1 = $conn->query($sql);
                	$row1 = $result1->fetch_assoc();
                	$nam = $row1["Company_name"];
                  echo  " - Name: " . $nam . " -Salary: " . $row["Package"].  " -Position: " . $row["Position"] . "<br>";
                }
              } else {
                echo "No one placed so far";
              }
              $conn->close();        
?>
</body>
</html>