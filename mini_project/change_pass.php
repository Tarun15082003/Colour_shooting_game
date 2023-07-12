<?php
session_start();
ini_set('display_errors', 1);
error_reporting(-1);
ini_set('display_errors', 1);
error_reporting(-1);
$ID = $_SESSION['Student_id'];
$conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
if ($conn === false) {
echo 'ERROR: Could not connect. ';
die('ERROR: Could not connect. ' . mysqli_connect_error());
}
if ( isset($_POST['password']) && isset($_POST['cnfpassword'])) {
function validate($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$password = validate($_POST['password']);
$cnfpassword = validate($_POST['cnfpassword']);
if (empty($password)) {
header('Location: change.php?error=password is required');
exit();
} elseif (empty($cnfpassword)) {
header('Location: change.php?error=password is required');
exit();
} else {
$sql = "SELECT * FROM login_details WHERE Student_id='$ID'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
$row = mysqli_fetch_assoc($result);

if($cnfpassword !== $password){
echo("Password Not Matched");
exit();
}
$sql = "UPDATE login_details SET password='$password' WHERE Student_id='$ID'";
$result = mysqli_query($conn, $sql);
if ($result) {
echo '<h3>Details Updated</h3>';
echo 'Please login again';
} else {
echo 'Not Updated';
}
} else {
header(
'Location: home.php?error=Incorect User name or Department'
);
exit();
}
}
} else {
header('Location: home.php');
exit();
}
?>
<form action="logout.php">
<button type="submit">
Log out
</button>
</form>
