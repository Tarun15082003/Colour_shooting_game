<?php
session_start();
?>
<html>
    <body>
       <h2> Can you enter the details which are looking for you </h2>
       <br><br><br>
       <form action="company_profile_verify.php" method="post">
        Minimum CPI required: <input type  = "float" name="num"><br>
        Roles which are you looking for: <input type ="text" name ="role"><br>
        Can you give more info about the job: <input type = "text" name ="info"><br>
        Mode of interview : <input type="radio" name="Mode of interview" value="online">Online
        <input type="radio" name="Mode of interview" value="offline">Offline<br>
        Salary: <input type = "integer" name="sal"><br>
        <input type="submit", value="Save">
</form>
</body>
</html>
