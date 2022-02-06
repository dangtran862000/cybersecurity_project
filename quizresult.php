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

  @media screen and (min-width: 800px) {
    .img-col1 {
    display: none;
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
    .col3 {
      background-color: rgb(219, 226, 245); /* Make elements inside the container behave like table cells */
      display: block;
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
        $username = $_SESSION["user_login"];
        $sql = "SELECT * FROM user WHERE user_name='$username'";
        $user_level = mysqli_query($conn,$sql);
        $row_quiz = mysqli_fetch_assoc($user_level);
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
      <div class="col3" >
            
          </div>
      </div>
    
    </div>
  </body>

    <div class="footer">
      <div class="logout_footer">
    <a href="logout.php" title="LogOut" class="btn btn-info btn-lg" style="float: center; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a>
      </div>
    </div>


</html>