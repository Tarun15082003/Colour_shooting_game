<?php
session_start();
?>

<html>
  <body>
    <form method="POST" action="">
      Enter the Name of the company: <input type="text" name="nam"><br>
      Enter the minimum CPI: <input type="number" name="num" step="0.01"><br>
      Enter the salary criteria: <input type="number" name="sal"><br>
      Enter the year: <input type="number" name="yr"><br>
      <input type="submit" name="click" value="Results"><br>

      <?php
      if (isset($_POST["click"])) {
        $yr = $_POST["yr"];
        $nam = $_POST["nam"];
        $num = $_POST["num"];
        $sal = $_POST["sal"];
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

        // Prepare and bind the SQL statement to avoid SQL injection
        $stmt = $conn->prepare("SELECT Student_id, status FROM student WHERE Joining_year = ? AND CGPA >= ?");
        if ($stmt === false) {
          die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("ii", $yr, $num);

        if ($stmt->execute() === false) {
          die("Error executing query: " . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result === false) {
          die("Error getting result set: " . $stmt->error);
        }

        // Select placed students outside the loop
        $inner_result = $conn->query("SELECT * FROM placed_students WHERE Package <= '$sal'");
        if ($inner_result === false) {
          die("Error executing query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            $placed = $row['status'];
            $x = $row['Student_id'];
            $stud_id = $row["Student_id"];

            while ($inner_result->num_rows > 0 && $inner_row = $inner_result->fetch_assoc()) {
              echo "Roll number " . $x . "<br>";
            }
            

            if ($placed == 0) {
              echo "Roll number " . $x . "<br>";
            }
          }
        } else {
          echo "No Companies in this year";
        }

        // Close the connection
        $conn->close();
      }
      ?>
    </form>
  </body>
</html>
