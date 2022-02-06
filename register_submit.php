<?php
    session_start();
    require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
        require 'PHPMailer-master/PHPMailer-master/src/POP3.php';
        require 'PHPMailer-master/PHPMailer-master/src/OAuth.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

    include 'config.php';
    if( isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != '' && $_POST["email"] != '') {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $email = $_POST["email"];
        $level = 0;
        if ($password != $repassword ){
            $_SESSION["thongbao"] = "Password nhập lại không chính xác";
            header("location:index.php");
            die();
        }
        $sql = "SELECT * FROM user WHERE user_name='$username'";
        $old = mysqli_query($conn,$sql);
        if (mysqli_num_rows($old)>0) {
            $_SESSION["thongbao"] = "Username đã tồn tại";
            header("location:index.php");
            die();
        }
        

       
         // Kiểm tra tài khoản đã đăng ký chưa (mở comment để hiện chức năng)
        // -------------------------------------------------------------------------------------------------------------------------
        // $sql_email = "SELECT * FROM user WHERE email='$email'";
        // $old_email = mysqli_query($conn,$sql_email);
        // if (mysqli_num_rows($old_email)>0) {
        //     $_SESSION["thongbao"] = "Email đã được đăng ký tài khoản";
        //     header("location:login.php");
        //     die();
        // }

         // Gửi mail verify (mở comment để hiện chức năng)
        // -------------------------------------------------------------------------------------------------------------------------

        $verificationCode = rand(100000,999999);
        $hash_code = md5($verificationCode);
       // send the email verification

        $htmlStr = "";
        $htmlStr .= "Hi " . $email . ",<br /><br />";
        $htmlStr .= "Please click the link below to verify your email address and have access to your account.<br/><br/><br/>";
        $htmlStr .= "<a href='register/verification.php?username=$username&code=$hash_code' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
        $htmlStr .= " Your verify code: $verificationCode <br/><br/>";
        $htmlStr .= "Kind regards,<br />";
        $htmlStr .= "Admin<br />";

        $developmentMode = false;
        //Create an instance; passing `true` enables exceptions
        $mailer = new PHPMailer($developmentMode);

        $mailer->isSMTP();
        try {
            $mailer->SMTPDebug = 0;

        if ($developmentMode) {
        $mailer->SMTPOptions = [
            'ssl'=> [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ];
        }

        $mailer->Host = 'dthlweb.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'info@dthlweb.com';
        $mailer->Password = 'Haidang86.';
        $mailer->SMTPSecure = 'tls'; //'tls'
        // $mailer->SMTPAutoTLS = false;
        $mailer->Port = 587; //587, 465, 25, 2525 have been tested

        $mailer->setFrom('info@dthlweb.com', 'Hai Dang Admin');
        $mailer->addAddress($email, $username);

        //Content
        $mailer->isHTML(true); // Set email format to HTML
        $mailer->Subject = 'Verification Step';
        $mailer->Body = "Hi $username, <br/><br/><a href='https://dthlweb.com/verification.php?username=$username&code=$hash_code/' >VERIFY YOUR EMAIL HERE</a><br /><br />Your verify code: $verificationCode <br/><br/>Kind regards,<br />Admin";
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mailer->send();
        $mailer->ClearAllRecipients();
        
        echo "MAIL HAS BEEN SENT SUCCESSFULLY";
        
        } catch (Exception $e) {
            echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
        }

    // -------------------------------------------------------------------------------------------------------------------------

        $sql = "INSERT INTO user (user_name,email,password,verify_code,level) VALUES ('$username','$email','$password','$verificationCode','$level')";
        mysqli_query($conn,$sql);
        ?> <?php
        
        // Gửi mail verify (mở comment để hiện chức năng)
        header("location:verification.php?username=".$username."&code=".$hash_code);
        // -------------------------------------------------------------------------------------------------------------------------
        // $_SESSION["thongbao"] = "Đăng ký thành công";
        // header("location:login.php");
        ?><?php

        
    } else {
        $_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
        header("location:index.php");
    }
?>