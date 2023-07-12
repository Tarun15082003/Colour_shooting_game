<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
$conn = mysqli_connect('localhost:3307', 'root', '', 'mini_project');
if ($conn === false) {
die('ERROR: Could not connect. ' . mysqli_connect_error());
}
if (isset($_POST['Student_id']) && isset($_POST['password'])) {
function validate($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$id = validate($_POST['Student_id']);
$pass = validate($_POST['password']);
if (empty($id)) {
header('Location: Student_login.php?error = ID is required');
exit();
} elseif (empty($pass)) {
header('Location: Student_login.php?error = password is required');
exit();
} else {
$sql = "SELECT * FROM login_details WHERE Student_id='$id' AND password='$pass'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 0) {
$row = mysqli_fetch_assoc($result);
if ($row['Student_id'] === $id && $row['password'] === $pass) {
echo 'Logged in!';
$_SESSION['logged_in'] = true;
$_SESSION['Student_id'] = $row['Student_id'];
$_SESSION['password'] = $row['password'];
header('Location: home_page.php');
} else {
header(
'Location: Student_login.php?error = Incorect User name or password'
);
exit();
}
} else {
header(
'Location: Student_login.php?error = Incorect User name or password'
);
exit();
}
}
} else {
header('Location: Student_login.php');
exit();
}
?>
<br>
