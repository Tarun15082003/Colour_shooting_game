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
if($placed == 1){
  echo "Already Placed" ;
}
else{
if(isset($_POST['details'])) {
  $cid = $_POST['cid'];
  $pos = $_POST['pos'];
  $sal = $_POST['sal'];
}
$year = date('Y'); 
$sql="INSERT into placed_students values ('$id','$sal','$pos','$cid','$year')";
$result = mysqli_query($conn, $sql);
if(mysqli_errno($conn) === 0){
    $sqlr = "UPDATE student set status = 1 where Student_id = '$id' ";
    $resultr = mysqli_query($conn, $sqlr);
    echo "Congratulations";
}
else {
    echo "Failed to Accept. Please try again";
}
}
?>
<br>
<br>
</h3>
<a href="home_page.php"><button action="home_page.php">Home Page</button></a>
<br>
<br>