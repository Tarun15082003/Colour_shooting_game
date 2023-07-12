<?php
session_start();
$conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
if ($conn === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
ini_set('display_errors', 1);
error_reporting(-1);
$id = $_SESSION['Student_id'];
if(isset($_POST['details'])) {
  $cid = $_POST['cid'];
  $pos = $_POST['pos'];
  $sal = $_POST['sal'];
}
$sql="INSERT into new_notifications values ('$id','$pos','$sal','$cid')";
$result = mysqli_query($conn, $sql);
if(mysqli_errno($conn) == 0){
    echo "Applied Successfully";
}
else if(mysqli_errno($conn) == 1062){
    echo "Already applied. Please wait for response";
}
else {
    echo "Failed to Apply. Please try again";
}
?>
<br>
<br>
</h3>
<a href="home_page.php"><button action="home_page.php">Home Page</button></a>
<br>
<br>