
<html>
    <body>
        <?php
         session_start();
          $num=$_POST["num"];
          $role=$_POST["role"];
          $info = $_POST["info"];
          $sal = $_POST["sal"];
          $uid = $_SESSION["id"];
          $inter = $_POST["Mode_of_interview"];
          $yr = date('Y');
          $_SESSION['company_salary'] = $sal;
          $conn = new mysqli("localhost:3307","root","","mini_project");
        if($conn->connect_error){
            die("connection failed".$conn->connect_error."\n");
            exit();
        }
        $sql = "Insert into position values ('$uid',$num,'$role','$info','$inter',$sal,$yr)";
        $result = $conn->query($sql);
        if($result)
        {
            //echo $_SESSION['company_salary'];
            echo 'Profile Saved successfully!';
        }        
        ?>
<br>
<a href="company_welcome_page.php">Back to page</a>
</body>
</html>