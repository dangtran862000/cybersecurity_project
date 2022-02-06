<?php 
  session_start();
  if (!isset($_SESSION["user_login"])) {
    header("location:login.php");
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Password Game</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet"  href="logincss.css">
<link rel="stylesheet" href="style.css">

<style type="text/css">
  
  .logout_header {
    display: block;
  }
  .logout_footer {
    display: none;
  }
  .parent {

  height: 200px;
  width: 200px;
  position: relative;
  }
  .child {

  width: 10%;
  position: absolute;
  top: 20%;
  left: 50%;
  margin: -35px 0 0 -35px;
  }

  @media screen and (min-width: 800px) {
    .img-col1 {
    display: none;
  }
  }
  @media screen and (min-width: 1200px) and (max-width: 2500px) {
    
    .col1 {
        height: 1000px;
    }
    .col2 {
        height: 1000px;
    }
  }
  @media screen and (min-width: 2501px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
  }
  @media screen and (max-width: 800px) {
    .col-container {
      display: inline; /* Make the container element behave like a table */
      width: 100%; /* Set full-width to expand the whole page */
    }
    .logout_header {
      display: none;
    }
    .logout_footer {
      display: block;
    }
    .child {
      display: none;
      margin-top: 250%;
      
    }
    .col1 {
      display: block;
      width: 100%;
      height: 150px;
    }
    .col2 {
      width: 100%;
      height: 500px;
    }
  }

</style>
</head>
<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        include 'config.php';
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result_quiz = mysqli_query($conn, 'select count(id) as total from quiz');
        $row_quiz = mysqli_fetch_assoc($result_quiz);
        $total_records = $row_quiz['total'];
        $current_page = 0;
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE

        //hash page number
        $current_page_hash = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($current_page_hash == md5(0)) {
          $current_page = 0;
        }
        if ($current_page_hash == md5(1)) {
          $current_page = 1;
        }
        if ($current_page_hash == md5(2)) {
          $current_page = 2;
        }
        if ($current_page_hash == md5(3)) {
          $current_page = 3;
        }
        if ($current_page_hash == md5(4)) {
          $current_page = 4;
        }
        if ($current_page_hash == md5(5)) {
          $current_page = 5;
        }
        if ($current_page_hash == md5(6)) {
          $current_page = 6;
        }
        if ($current_page_hash == md5(7)) {
          $current_page = 7;
        }
        if ($current_page_hash == md5(8)) {
          $current_page = 8;
        }
        if ($current_page_hash == md5(9)) {
          $current_page = 9;
        }
        if ($current_page_hash == md5(10)) {
          $current_page = 10;
        }
        if ($current_page_hash == md5(11)) {
          $current_page = 11;
        }


        $limit = 1;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $result_quiz = mysqli_query($conn, "SELECT * FROM quiz LIMIT $start, $limit");
        
        while ($row_quiz = mysqli_fetch_assoc($result_quiz)){
          $question_quiz = $row_quiz['question'];
          $id_quiz = $row_quiz['id'];
          $answer1_quiz = $row_quiz['answer1'];
          $answer2_quiz = $row_quiz['answer2'];
          if (($row_quiz['id'] = 2) or ($row_quiz['id'] = 3) or ($row_quiz['id'] = 4)) {
            $answer3_quiz = $row_quiz['answer3'];
          } ;
        }
        if ($current_page <= 1){
          $_SESSION["level"] = 0;
        }
        ?>
<body>
    <div class="header">
      <h1>PASSWORD GAME <a href="logout.php" title="LogOut" class="btn btn-info btn-lg logout_header" style="float: right; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a></h1>
      
    </div>
  
    <div class="col-container">
      <div class="col1" style="position: relative;" >

          <img src="./Image/iconCODE-FINAL-RGB-FULL.png" style="width: 20%;" class=" child"></img>
          <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center img-col1">  
          <img src="./Image/iconCODE-FINAL-RGB-FULL - original.png" style="width: 40%;" class="center"></img>
          </div>
      </div>
    
      <div class="col2">
        <div style="margin-top: 15%; margin-left: 15%; margin-right:15%">
          <div style = "text-align: center; float: center;" >

            <?php
            // Criteria checking quiz
            // QUESTION 1
            
            if($current_page == 1 && isset($_POST['button1'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==1 && isset($_POST['button2'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 2
            if($current_page ==2 && isset($_POST['button1'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==2 && isset($_POST['button2'])) {
              $_SESSION["level"] += 5;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==2 && isset($_POST['button3'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 3
            if($current_page ==3 && isset($_POST['button1'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==3 && isset($_POST['button2'])) {
              $_SESSION["level"] += 5;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==3 && isset($_POST['button3'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 4
            if($current_page ==4 && isset($_POST['button1'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==4 && isset($_POST['button2'])) {
              $_SESSION["level"] += 5;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==4 && isset($_POST['button3'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 5
            if($current_page ==5 && isset($_POST['button1'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==5 && isset($_POST['button2'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 6
            if($current_page ==6 && isset($_POST['button1'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==6 && isset($_POST['button2'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 7
            if($current_page ==7 && isset($_POST['button1'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==7 && isset($_POST['button2'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 8
            if($current_page ==8 && isset($_POST['button1'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==8 && isset($_POST['button2'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 9
            if($current_page == 9 && isset($_POST['button1'])) {
              $_SESSION["level"] += 0;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            if($current_page ==9 && isset($_POST['button2'])) {
              $_SESSION["level"] += 10;
              header('location: passwordGame.php?page='. md5((string)($current_page+1)));
            }
            // QUESTION 10
            if($current_page ==10 && isset($_POST['button1'])) {
              $_SESSION["level"] += 0;
              $level = $_SESSION["level"];
              $user_login_name = $_SESSION["user_login"];
              echo $user_login_name;
              $sql = "UPDATE user
              SET level=$level
              WHERE user_name= '$user_login_name'";
              mysqli_query($conn,$sql);
              header('location: quizpasswordresult.php');
            }
            if($current_page ==10 && isset($_POST['button2'])) {
              $_SESSION["level"] += 10;
              $level = $_SESSION["level"];
              $user_login_name = $_SESSION["user_login"];
              echo $user_login_name;
              $sql = "UPDATE user
              SET level=$level
              WHERE user_name= '$user_login_name'";
              mysqli_query($conn,$sql);
              header('location: quizpasswordresult.php');
            }
            ?>

            <h2 style="margin-bottom: 5%"><?php echo $question_quiz ?></h2>
            <?php 
              if ($current_page == 9) { ?>
                <i style="margin-bottom: 5%">(*) Tính năng xác thực 2 yếu tố (2 factor authentication) là bổ sung thêm một lớp bảo mật nữa cho tài khoản của bạn, ngoài lớp mật khẩu mà bạn vẫn hay dùng. Ví dụ: SMS, OTP hoặc ứng dụng xác thực.</i>
                <br><br>
                <?php
              }
              ?>
            <form method="POST">
            <input class="loginbutton" type="submit" name="button1"  value ="<?php echo $answer1_quiz ?>"></input><br><br>
            <input class="loginbutton" type="submit" name="button2" value ="<?php echo $answer2_quiz ?>"></input><br><br>
              <?php 
              if (($current_page == 2) or ($current_page == 3) or ($current_page == 4)) { ?>
                <input class="loginbutton" type="submit" name="button3" value ="<?php echo $answer3_quiz ?>"></input><?php
              }
              ?>
            </form>
            <div class="pagination" style ="margin-top:10%">
              <?php 
                    // PHẦN HIỂN THỊ PHÂN TRANG
                    // BƯỚC 7: HIỂN THỊ PHÂN TRANG
        
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    // if ($current_page > 1 && $total_page > 1){
                    //     echo '<a href="passwordGame.php?page='.($current_page-1).'">Prev</a>';
                    // }
        
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page){
                            echo '<a class="active" style="pointer-events: none" href="passwordGame.php?page='.$i.'">'.$i.'</a>';
                        }
                        else{
                            echo '<a style="pointer-events: none" href="passwordGame.php?page='.$i.'">'.$i.'</a>';
                        }
                    }
        
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    // if ($current_page < $total_page && $total_page > 1){
                    //     echo '<a href="passwordGame.php?page='.($current_page+1).'">Next</a>';
                    // }
                  ?>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  
    <div class="footer">
    <h4 style="display: block">Contact us</h5><a href="mailto:info@dthlweb.com"><h4 style="color: darkblue">info@dthlweb.com</h4></a><br>
      <div class="logout_footer">
    <a href="logout.php" title="LogOut" class="btn btn-info btn-lg" style="float: center; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a>
      </div>
    </div>


</html>