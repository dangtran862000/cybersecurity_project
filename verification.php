<!--  -->
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
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập</title>
  <link rel="stylesheet" type="text/css" href="logincss.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">  
        <img src="./Image/iconCODE-FINAL-RGB-FULL - original.png" style="width: 20%;" class="center"></img>
        </div>
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">  
          <h1><a href="" rel="dofollow">CYBER SECURITY WORKSHOP <?php  $current_page_hash = isset($_GET['username']) ? $_GET['username'] : null;   ?></a></h1>
        
        </div>
        <?php 
            include 'config.php';
            if( isset($_POST['submit']) && $_POST["verify"] != '') {
                $username = $current_page_hash;
                $verify = $_POST["verify"];
                $sql = "SELECT * FROM user WHERE user_name='$username' AND verify_code='$verify'";
                $user = mysqli_query($conn,$sql);
                $result = $conn->query($sql);
                if(mysqli_num_rows($user)>0) {
                    while($row = $result->fetch_assoc()) {
                        $sql = "UPDATE user
                        SET verify=1
                        WHERE user_name= '$username'";
                        mysqli_query($conn,$sql);
                        header("location:passwordGame.php");
                    
                    }
                } else {
                    $_SESSION["thongbao"] = "Bạn đã nhập sai code";
                    //header("location:login.php"); 
                }
            } else {
                $_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
                //header("location:login.php");  
            }
        ?>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Verify your email account</span>
              <p style="font-style: italic; color: red">
              <?php 
                    if(isset($_SESSION["thongbao"])) {
                        echo "*" ;
                        echo $_SESSION["thongbao"];
                        unset($_SESSION["thongbao"]);
                    }
                ?>
            </p><br>
              <form id="stripe-login" method="POST">
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="verify">VERIFICATION CODE</label>
                  </div>
                  <input type ="verify" name="verify">
                </div>
                <div class="field padding-bottom--24">
                <button class="loginbutton" type="submit" name="submit">VERIFY</button>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="index.php">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="https://code-rmit.edu.vn/">RMIT Centre of Digital Excellent (CODE)</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>