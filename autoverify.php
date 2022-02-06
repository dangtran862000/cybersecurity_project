<?php 
    include 'config.php';
    $current_page_hash = isset($_GET['username']) ? $_GET['username'] : null;
    $current_code_hash = isset($_GET['code']) ? $_GET['code'] : null;

    if($current_code_hash == null || $current_page_hash == null) {
        header("location:login.php");
    } else {
        $username = $current_page_hash;
        $verify = 1;
        $sql = "SELECT * FROM user WHERE user_name='$username' AND verify='$verify'";
        $user = mysqli_query($conn,$sql);
        $result = $conn->query($sql);
        if(mysqli_num_rows($user)>0) {
            while($row = $result->fetch_assoc()) {
                if ($row['verify'] == 1) {
                    header("location:verified.php");
                }
                
            }
        } else {
            if ($row['verify'] == 0) {
                echo $row['verify'];
                $sql = "UPDATE user
                    SET verify=1
                    WHERE user_name= '$username'";
                mysqli_query($conn,$sql);
                header("location:passwordGame.php");
            }
            else if ($row['verify'] == 1) {
                header("location:verified.php");
            }
        }
    }  
?>
