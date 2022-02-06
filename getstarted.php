<?php 
//   session_start();
//   if (!isset($_SESSION["user_login"])) {
//     header("location:login.php");
//   }
?>

<!DOCTYPE html>
<html>
<head>
<title>Cyber-Security Workshop</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="logincss.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css-circular-prog-bar.css">
<style type="text/css">
   
  .col3 {
        display: none;
    }
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

  .position {
  float: left;
  margin: 100px 20px;
}


@media screen and (min-width: 800px) {
    .img-col1 {
    display: none;
  }
  }
  @media screen and (min-width: 1200px) and (max-width: 2500px) {
    
    .col1 {
        height: 900px;
    }
    .col2 {
        height: 900px;
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
      display: block; /* Make the container element behave like a table */
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
        display: none;
    background-color: rgb(219, 226, 245); /* Make elements inside the container behave like table cells */
      width: 100%;
      height: 600px;
    }

    .col3 {
      background-color: rgb(219, 226, 245); /* Make elements inside the container behave like table cells */
      display: block;
      width: 100%;
      height: 600px;
    }
  }

</style>

</head>

<body>
    <div class="header">
      <h1>CYBER-SECURITY WORKSHOP<a href="logout.php" title="LogOut" class="btn btn-info btn-lg logout_header" style="float: right; background-color: rgb(83, 82, 122);">
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
        <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica;" class = "center">CHÀO MỪNG BẠN ĐẾN VỚI CYBERSECURITY WORKSHOP</h1>
        <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica;" class = "center"><i>Hãy bắt đầu với những câu hỏi chuẩn đoán về thói quen sử dụng mật khẩu an toàn của học sinh, sinh viên</i></h3>
        <h4 style="text-align: center; float: center; margin-top: 2%; margin-left: 10%; margin-right:10%;" class = "center"><i style="color: red;font-weight: normal;">Lưu ý: Những câu hỏi về chuẩn đoán chỉ sử dụng để minh họa. Để đảm bảo tính bảo mật thông tin cá nhân của bạn, CODE không lưu trữ lại đáp án cũng như sử dụng với mục đích khác !</i></h4>
        <h4 style="text-align: center; float: center; margin-top: 2%; margin-left: 10%; margin-right:10%;" class = "center"><i style="color: red;font-weight: normal;">Vui lòng không chia sẽ đáp án này với bất kỳ ai để đảm bảo tính bảo mật của bạn !</i></h4>
        <div class="box-root padding-top--48 padding-bottom--0 flex-flex flex-justifyContent--center">
            <form id="stripe-login" action="phishinggetstarted.php">
                <div class="field padding-bottom--24">
                <button class="loginbutton" type = "submit">BẮT ĐẦU TRÒ CHƠI TRUY TÌM LỪA ĐẢO</button>
                </div>
            </form>
        </div>
        <div class="box-root padding-top--12 padding-bottom--0 flex-flex flex-justifyContent--center">
          <form id="stripe-login" action="passwordgetstarted.php">
                <div class="field padding-bottom--24">
                <button class="loginbutton" type = "submit">BẮT ĐẦU TRÒ CHƠI MẬT KHẨU</button>
                </div>
          </form>
        </div>
        </div>
        </div>
      </div>
      <div class="col3" >
        <div class = "container">
            <div>
                <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 15%; margin-right:15%" class = "center">YOUR QUIZ RESULT </h1>
                <h1 style="text-align: center; float: center; margin-top: 15%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica; font-size: 20px;" class = "center">CHÀO MỪNG BẠN ĐẾN VỚI CYBERSECURITY WORKSHOP</h1>
                <h3 style="text-align: center; float: center; margin-top: 5%; margin-left: 10%; margin-right:10%; font-family:courier,arial,helvetica; font-size: 15px;" class = "center"><i>Hãy bắt đầu với những câu hỏi chuẩn đoán về thói quen sử dụng mật khẩu an toàn của học sinh, sinh viên</i></h3>
                <h4 style="text-align: center; float: center; margin-top: 2%; margin-left: 10%; margin-right:10%;" class = "center"><i style="color: red;font-weight: normal;">Lưu ý: Những câu hỏi về chuẩn đoán chỉ sử dụng để minh họa. Để đảm bảo tính bảo mật thông tin cá nhân của bạn, CODE không lưu trữ lại đáp án cũng như sử dụng với mục đích khác !</i></h4>
        <h4 style="text-align: center; float: center; margin-top: 2%; margin-left: 10%; margin-right:10%;" class = "center"><i style="color: red;font-weight: normal;">Vui lòng không chia sẽ đáp án này với bất kỳ ai để đảm bảo tính bảo mật của bạn !</i></h4>
                </div>
                </div>
            </div>
            </div>
        </div>
      </div>

    </div>
    <div class="footer">
    <h4 style="display: block">Contact us</h5><a href="mailto:info@dthlweb.com"><h4 style="color: darkblue">info@dthlweb.com</h4></a><br>
      <div class="logout_footer">
    <a href="logout.php" title="LogOut" class="btn btn-info btn-lg" style="float: center; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a>
      </div>
    </div>

</body>


</html>