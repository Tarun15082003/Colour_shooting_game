
<?php
session_start();
?>
<html>
<body>
<?php
$company_name = $_POST['c_name'];
$company_email = $_POST['email'];
$company_password = $_POST['password'];
$conpass = $_POST['confirm_password'];
$curyr=date('Y');
if($company_password!=$conpass){
    echo "Passwords not matching";
    exit();
}
else{
    $conn = new mysqli("localhost:3307","root","","mini_project");
    if($conn->connect_error){
    	die("connection failed".$conn->connect_error."\n");
        exit();
    }
    else
    {
        if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            exit();
        }
        // if($email_array[1]!="iitp.ac.in")
        // {
        //     echo "Enter a valid iitp email id";
        //     exit();
        // }
        // $uppercase = preg_match('@[A-Z]@', $pass);
        // $lowercase = preg_match('@[a-z]@', $pass);
        // $number    = preg_match('@[0-9]@', $pass);
        // $specialChars = preg_match('@[^\w]@', $pass);

        // if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
        //     echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        //     exit();
        // }
        $_SESSION['year']=$curyr;
        $sql  = "Insert into company (Company_name, Company_email, Company_password,Year) VALUES  ('$company_name','$company_email','$company_password',$curyr)";
     //   $result = $conn->query($sql);
        if(mysqli_query($conn, $sql))
        {
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

// // Create a new PHPMailer instance
// $mail = new PHPMailer();

// // Set up SMTP
// $mail->isSMTP();
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
// $mail->SMTPAuth = true;
// $mail->Username = 'suryacodeacc.7@gmail.com';
// $mail->Password = 'Hsgs@12345';

// // Set up email
// $mail->setFrom('suryacodeacc.7@gmail.com', 'TPC Portal');
// $mail->addAddress($company_email);
// $mail->Subject = 'Test Email';
// $mail->Body = 'This is a test email';

// // Send the email
// if(!$mail->send()) {
//     echo 'Email could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Email sent successfully.';
// }

            // $to = $email;
            // $subject = "Thanking you login into TPC Portal";
            // $message ="Please use this ID = $uid to login into TPC portal";
            // $headers = "From: bsurya210603@gmail.com \r\n".
            //             "Reply-To: bsurya210603@gmail.com\r\n".
            //             "Content-type: text/html; charset=UTF-8\r\n";
            // $retval= mail($to,$subject,$message,$headers);
            // if( $retval == true ) {
            //     echo "Email sent successfully...";
            //  }else {
            //     echo "Email could not be sent...";
            //  }
            $sql = "SELECT Company_id FROM company WHERE Company_name ='$company_name' and Year = '$curyr' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $uid = $row['Company_id'];
            echo "Please use this '$uid' via login in thankyou ";
            $_SESSION['uid']=$uid;
        }else{
              echo "hi";
        }
    }
	
}
?>
<br>
<a href="company_login.php">Login</a>


</body>
</html>
