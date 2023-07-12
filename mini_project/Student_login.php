<?php
ini_set('display_errors', 1);
error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
<title>LOGIN</title>
</head>
<body>
<center>
<form action="Student_login_chk.php" method="post">
<h1>LOGIN</h1>
<br/>
<?php if (isset($_GET['error'])) { ?>
<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
<label>Student_ID : </label>
<input type="text" name="Student_id" placeholder="Enter your Student_id"><br>
<br>
<label>Password : </label>
<input type="password" name="password" placeholder="Enter your password"><br>
<br>
<br>
<button type="submit">Login</button>
<br>
</center>
</body>
</html>