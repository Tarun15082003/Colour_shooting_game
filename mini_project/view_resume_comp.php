<?php
session_start();
$conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
if ($conn === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
ini_set('display_errors', 1);
error_reporting(-1);
if(isset($_POST['cred'])) {
    $id = $_POST['id'];
}
$sql = "SELECT * FROM student WHERE Student_id='$id' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $res=$row['Resume_Link'];
}
else {
    die("PDF file not found");
}
header('Content-type: application/pdf');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
echo $res;
?>