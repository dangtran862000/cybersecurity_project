<?php 
    session_start();
    include 'config.php';
    if( isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '') {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM user WHERE user_name='$username' AND password='$password'";
        $user = mysqli_query($conn,$sql);
        $result = $conn->query($sql);
        
        if(mysqli_num_rows($user)>0) {
            while($row = $result->fetch_assoc()) {
                $code = $row['verify_code'];
                $hash_verify = md5($code);

                // CHức năng thường (mở comment để hiện chức năng)
                // ----------------------------------------------------------------------------------
                // $_SESSION["user_login"] = $username;
                // $_SESSION["thongbao"] = "Đăng ký thành công";
                // header("location:passwordGame.php");

                // Gửi mail verify (mở comment để hiện chức năng)
                //-------------------------------------------------------------------------------------
                if($row['verify'] == 1) {
                    print_r($_SESSION);
                $_SESSION["user_login"] = $username;
                header("location:passwordGame.php");
                } else {
                    $_SESSION["thongbao"] = 'Bạn cần xác nhận email';
                header("location:login.php?username=".$username);
                }
                //-------------------------------------------------------------------------------------
              }
        } else {
            $_SESSION["thongbao"] = "Bạn đã đăng nhập sai username hoặc password";
            header("location:login.php"); 
        }
    } else {
        $_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
        header("location:login.php");  
    }

?>