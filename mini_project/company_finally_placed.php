
<html>
    <body>
    <form method="POST" action="">
    Enter the year :<input type = "integer" name ="yr"><br>
    <h6>if all the year then enter all</h6>
    <input type ="submit" name ="click" value="Results"><br>
    </body>
</html>
    <?php
    session_start();
    if(isset($_POST["click"])){
        $nam=$_SESSION["cname"];
        $yr=$_POST["yr"];
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "mini_project";
        $id = $_SESSION['id'];
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
        if($yr==0){
            $sql="select Student_id,Package,Position from placed_students where Company_id='$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo  " - Roll_no: " . $row["Student_id"] . " -Salary: " . $row["Package"]. " -Position: " . $row["Position"] . "<br>";
                }
              } else {
                echo "No one placed so far";
              }
              $conn->close();
        }else{
          $sql="select Student_id,Package,Position from placed_students where Company_id='$id' and year='$yr'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo  " - Roll_no: " . $row["Student_id"] . " -Salary: " . $row["Package"]. " -Position: " . $row["Position"] . "<br>";
                }
              } else {
                echo "No one placed so far";
              }
              $conn->close();
        }
    }
    ?>
