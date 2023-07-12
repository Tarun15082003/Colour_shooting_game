<?php
// Start the session
session_start();
?>
<html>
    <body>
        <?php   
            if(empty($_SESSION))
            {
                exit();
            }
        ?>
        <?php
            ini_set('display_errors', 1);
            error_reporting(-1);
            $id = $_SESSION['id'];
            ?>
        <h2>Welcome <?php echo $_SESSION['cname'] ?>!</h2><br><br><br>
        <a href="company_profile.php">Profile</a><br>
        <a href="new_company_notifi.php">New Notification</a><br>
        <a href="old_company_notifi.php">Old Pending Notification</a><br>
        <a href="company_finally_placed.php">Placed Students</a><br>
        <a href="company_logout_page.php">Logout</a><br>
    </body>
</html>
