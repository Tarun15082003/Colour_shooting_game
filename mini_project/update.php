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
ini_set('display_errors', 1);
error_reporting(-1);
?>
<html>
<body>
<center>
<h3>Change Your Password</h3>
<form action="change_pass.php" method="post">
<h3><label for="password">Password : </label>
<input type="password" name="password" placeholder="Enter Password"><br>
</h3>
<h3><label for="cnfpassword"> Confirm Password : </label>
<input type="password" name="cnfpassword" placeholder="Re-enter
Password"><br>
</h3>
<br>
<button type="submit">Change Password</button>
</form>
</center>
</body>
</html>