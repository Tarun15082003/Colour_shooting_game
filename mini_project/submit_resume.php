<?php
session_start();
$conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
if ($conn === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
ini_set('display_errors', 1);
error_reporting(-1);
$id = $_SESSION['Student_id'];
if(isset($_POST['submit'])) {
  $pdf_data = file_get_contents($_FILES['fileToUpload']['tmp_name']);
  $pdf_data = mysqli_real_escape_string($conn, $pdf_data);
  $sql = "UPDATE student SET Resume_link='$pdf_data' WHERE Student_id='$id'";
  if (mysqli_query($conn, $sql)) {
    echo "PDF file uploaded successfully.";
  } else {
    echo "Error uploading PDF file: " . mysqli_error($conn);
  }
}
?>
<br>
<br>
<form action="home_page.php">
<button type="submit">
HOME PAGE
</button>
</form>