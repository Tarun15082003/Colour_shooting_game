<head>
<script type="text/javascript">
var baseUrl = 'http://localhost/mini_project/';
/*function ConfirmDelete() {
if (confirm("Delete Account?"))
location.href = baseUrl + '/delete.php';
}*/
</script>
</head>
<?php
session_start();
$conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
if ($conn === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
ini_set('display_errors', 1);
error_reporting(-1);
$id = $_SESSION['Student_id'];
$sql = "SELECT * FROM student WHERE Student_id='$id' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $fname=$row['first_name'];
    $lname=$row['last_name'];
    $cgpa=$row['CGPA'];
    $res=$row['Resume_Link'];
    $_SESSION['CGPA'] = $cgpa;
}
?>
<html>
<body>
<center>
<br>
<br>
<h3>
First Name : 
<?php
echo($fname);
?>
</h3>
<h3>
Last Name : 
<?php
echo($lname);
?>
</h3>
<h3>
Resume : 
<a href="view_resume.php"><button action="view_resume.php">View Resume</button></a>
</h3>
<h3>
CGPA : 
<?php
echo($cgpa);
?>
<br>
<br>
</h3>
<a href="update.php"><button action="update.php">Update INFO</button></a>
<br>
<br>
<a href="update_resume.php"><button action="update_resume.php">Update RESUME</button></a>
<br>
<br>
<a href="apply.php"><button action="apply.php">APPLY</button></a>
<br>
<br>
<a href="roffers.php"><button action="roffers.php">View offers</button></a>
<br>
<br>
<a href="mypstatus.php"><button action="mypstatus.php">Placement Status</button></a>
<br>
<br>
<form action="logout.php">
<button type="submit">
Log out
</button>
</form>
</center>
</body>
</html>