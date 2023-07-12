<?php
// Start the session
session_start();
?>
<html>
    <body>
        <?php
            
            
            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();
            echo 'Logged out successfully!';
            
        ?>
        <br>
        <a href="company_login.php">Company Login Page</a>
    </body>
</html>