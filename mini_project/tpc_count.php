<html>
    <body>
    <form method="POST" action="">
    Enter the year :<input type = "integer" name ="yr"><br>
    <input type ="submit" name ="click" value="Results"><br>

    <?php
    if(isset($_POST["click"])){
        $yr=$_POST['yr'];
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
            $sql="select * from company where Year='$yr'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo  " - Name: " . $row["Company_name"].  "<br>";
                }
              } else {
                echo "No Companies in this year";
              }
              $conn->close();
    }
    ?>
</body>
</html>