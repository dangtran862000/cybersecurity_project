<?php 
   session_start();
   include 'config.php';
  if (!isset($_SESSION["user_login"])) {
    header("location:login.php");
    die();
  }
  $title_page = isset($_GET['choice']) ? $_GET['choice'] : 1;
    if ($title_page == 1) {
        $_SESSION["level_phishing"] = 0;
        $_SESSION["attempt"] = 0;
    }

if ($_SESSION["attempt"] == 10) {
    $level_phishing = $_SESSION["level_phishing"];
    $user_login_name = $_SESSION["user_login"];
    $sql = "UPDATE user
              SET phishing_result=$level_phishing
              WHERE user_name= '$user_login_name'";
    mysqli_query($conn,$sql);
    header("location:resultphishing.php");
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Phishing Game</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet"  href="phishinggame.css">
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

  .responsive {
    max-width: 100%;
    height: auto;
  }

  .loginbutton {
    font-size: 16px;
    line-height: 28px;
    padding: 8px 16px;
    width: 100%;
    min-height: 44px;
    border: unset;
    border-radius: 4px;
    outline-color: rgb(84 105 212 / 0.5);
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    background-color: rgb(84, 105, 212);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                rgb(84, 105, 212) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
  }

  .loginbuttonchoice {
    margin-top: 1%;
    font-size: 1vw;
    line-height: 28px;
    padding: 8px 16px;
    width: 10%;
    min-height: 44px;
    border: unset;
    border-radius: 4px;
    outline-color: rgb(84 105 212 / 0.5);
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    background-color: rgb(84, 105, 212);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                rgb(84, 105, 212) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
  }

  @media screen and (min-width: 800px) {
    .img-col1 {
    display: none;
    }
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
    .responsive {
        margin-top: 10%;
        max-width: 100%;
        height: auto;
    }
  }

  @media screen and (max-width: 800px) {
    
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
    .responsive {
        margin-top: 10%;
        max-width: 100%;
        height: auto;
    }
    
  }

  @media screen and (min-width: 860px) and (max-width: 1199px) {
    .col1 {
        height: 1000px;
    }
    .col2 {
        height: 1000px;
    }
    .responsive {
        margin-top: 5%;
        max-width: 00%;
        height: auto;
    }
  }

  @media screen and (min-width: 1200px) and (max-width: 2500px) {
    .col1 {
        height: 1000px;
    }
    .col2 {
        height: 1000px;
    }
    .responsive {
        margin-top: 0%;
        width: 60%;
        height: auto;
    }
  }
  @media screen and (min-width: 2501px) {
    .col1 {
        height: 1450px;
    }
    .col2 {
        height: 1450px;
    }
    .responsive {
        margin-top: 0%;
        width: 70%;
        height: auto;
    }
  }
  @media screen and (max-width: 780px) {
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
      max-width: 800px;
      height: 500px;
    }
    .responsive {
        margin-top: 20%;
        max-width: 100%;
        height: auto;
    }
    .loginbuttonchoice {
    margin-top: 1%;
    font-size: 2vw;
    width: 50%;
  }
  }
  /* ------------------------------------------------------------------------------ */
  /* fullscreen css */
    .overlay {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    }

    .overlay-content {
    position: relative;
    top: 5%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
    }

    .overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
    }

    .overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
    }

    .overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
    }

    @media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
    }
    }
    /* ------------------------------------------------------------------------------------- */
    #clockdiv h2{color:white;text-align:center;font-size:40px;margin:0 0 16px}
    #clockdiv{color:white;background:#dbe2f5;display:inline-block;text-align:center;font-size:50px;margin:20px auto;padding:20px;width:100%}
    #clockdiv > div{padding:10px 35px;border-radius:3px;background:#deb887;display:inline-block}
    #clockdiv div > span{padding:0;border-radius:10px;font-size:58px;display:inline-block}
    #clockdiv .smalltext{padding-top:5px;font-size:20px}
</style>

</head>

<?php 
    
    
    $title_page = isset($_GET['choice']) ? $_GET['choice'] : 1;
    if ($title_page == 1) {
        $_SESSION["level_phishing"] = 0;
        $_SESSION["attempt"] = 0;
    }
        $sql = "SELECT * FROM phishingimg WHERE title='$title_page'";
        $user = mysqli_query($conn,$sql);
        $result = $conn->query($sql);

        if(mysqli_num_rows($user)>0) {
            while($row = $result->fetch_assoc()) {
                $answer = $row['answer'];

                if($row['answer'] == 1) {
                    $_SESSION["level_phishing"] += 10;
                    $_SESSION["attempt"] += 1;
                    //echo '<p>true</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
                } else {
                    $_SESSION["attempt"] += 1;
                    //echo '<p>false</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
                }

              }
        } else if ($title_page == "null") {
            $_SESSION["attempt"] += 1;
            //echo '<p>'.$title_page.'</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
        } else {
            $_SESSION["attempt"] = 1;
            //echo '<p>'.$title_page.'</p>'.$_SESSION["level_phishing"].$_SESSION["attempt"];
        }
        
        $sql_question = "SELECT * FROM phishingimg WHERE answer = 1
        ORDER BY RAND()
        LIMIT 1";

        $array_questions = [];
        $user_question = mysqli_query($conn,$sql_question);
        $rand_quesiton = $conn->query($sql_question);
        
        if(mysqli_num_rows($user_question)>0) {
            while($origin_question = $rand_quesiton->fetch_assoc()) {
                echo $origin_question ['title'];
                array_push($array_questions, $origin_question ['title']) ;
              }
        }
        $sql_question = "SELECT * FROM phishingimg WHERE answer = 0
        ORDER BY RAND()
        LIMIT 4";

        $user_question = mysqli_query($conn,$sql_question);
        $rand_quesiton = $conn->query($sql_question);
        
        if(mysqli_num_rows($user_question)>0) {
            while($origin_question = $rand_quesiton->fetch_assoc()) {
                array_push($array_questions, $origin_question ['title']) ;
              }
        }
        shuffle($array_questions);
        print_r($array_questions);;
        
?>


<body>
    <div class="header">
      <h1>PHISHING GAME<a href="logout.php" title="LogOut" class="btn btn-info btn-lg logout_header" style="float: right; background-color: rgb(83, 82, 122);">
        <span class="glyphicon"></span>Log out
      </a></h1>
      
    </div>
  
    <div class="col-container">
      <div class="col1" style="position: relative;" >

        <img src="./Image/iconCODE-FINAL-RGB-FULL.png" style="width: 20%;" class=" child "></img>
          <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center img-col1">  
          <img src="./Image/iconCODE-FINAL-RGB-FULL - original.png" style="width: 40%;"></img>
          </div>

      </div>
    
      <div class="col2">
        <div style="margin-top: 10%; margin-left: 15%; margin-right:15%">
          <div style = "text-align: center; float: center;" >
          <h2 style="margin-bottom: 1%">VÒNG <?php echo $_SESSION["attempt"]; ?></h2>
            <!-- ------------------------------------------------ -->
            <!-- Đồng hồ đếm ngược -->
            <div id="clockdiv">
                <div >
                    <span class="minutes" >&nbsp;</span>
                    <div class="smalltext">&nbsp;PHÚT&nbsp;</div>
                </div>
                <div>
                    <span class="seconds">&nbsp;</span>
                    <div class="smalltext">&nbsp;GIÂY&nbsp;</div>
                </div>
                </div>
            </div>
            <!-- -------------------------------------------------------------- -->
            <!-- Thông báo khi người dùng hết thời gian -->
            <div id="notification_timeout">
                <h2  style="margin-bottom: 0%; text-align: center; float: center;color: red;">ĐÃ HẾT THỜI GIAN</h2>
                <h4  style="margin-bottom: 0%; text-align: center; float: center;color: red;">Rất tiếc ! Bạn chưa chọn được đáp án cho riêng mình</h4>
                <h4  style="margin-bottom: 0%; text-align: center; float: center;color: red;">Vui lòng nhấn nút bên dưới để qua vòng tiếp theo</h4>
                <h4  style="margin-bottom: 5%; text-align: center; float: center;color: red;"><i  style="margin-bottom: 0%; text-align: center; float: center;color: red;">Lưu ý: Bạn không được ghi nhận điểm cho vòng này !</i></h4>
                
                <form>
                    <input class="loginbutton" type="submit" value="VÒNG TIẾP THEO"></input>
                    <input type="text" style="display: none" id="choice" name="choice" value=null><br><br>
                </form>
            </div>
        <!-- ----------------------------------------------------------------------------------------- -->
        <!-- lựa chọn xem hình và phóng to hình -->
          <div id="countTime" style="margin-top: 1%; margin-left: 15%; margin-right:15%">
          <?php 
          for ($x = 0; $x < 5 ; $x++) {
            ?> <span style="font-size:30px; cursor:pointer; " onclick="openNav('myNav<?php echo $x; ?>')">
                    <button class="loginbutton" style="margin-top: 2%;">Hình ảnh <?php echo $x + 1; ?></button>
                    <!-- <img style="width: 300px; height: 300px; object-fit: contain; display: inline-block; magin-top: 5%; margin-left: 5%; margin-bottom: 5%" src="./phishingsrc/catphishing/<?php echo $a[$x]; ?>.png"  alt="phishing"> -->
                    </img>
                </span> 
            <?php
          }
          ?>
          <?php 
          for ($x = 0; $x < 5 ; $x++) {
            ?> <div id="countTime" style="display:flex;">
                    <div id="myNav<?php echo $x; ?>" class="overlay" >
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav('myNav<?php echo $x; ?>')">&times;</a>
                            <div class="overlay-content">
                            
                                <img class="responsive" src="./phishingsrc/<?php echo $array_questions[$x]; ?>.png" alt="phishing">
                                <form>
                                <input class="loginbuttonchoice" type="submit" value="LỰA CHỌN"></input>
                                <input type="text" style="display: none" id="choice" name="choice" value=<?php echo $array_questions[$x]; ?>><br><br>
                                </form>
                            </div>
                    </div>
                </div> 
            <?php
          }
          ?> 
        <!-- ------------------------------------------------------------------------------------------------------ -->
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

<!-- ---------------------------------------------------------------------- -->
<!-- Script cho click on button to full screen img -->
<script>
    function openNav(id) {
        document.getElementById(id).style.display = "block";
    }

    function closeNav(id) {
        document.getElementById(id).style.display = "none";
    }          
</script>
<!-- ---------------------------------------------------------------------- -->
<!-- Script cho dong ho dem ngươc  -->
<script type='text/javascript'>

    //<![CDATA[
    function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
    }

    function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    var choiceAnswer = document.getElementById("countTime");
    var notification_timeout = document.getElementById("notification_timeout");
    var daysSpan = clock.querySelector('.days');
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
        var t = getTimeRemaining(endtime);

        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
        clearInterval(timeinterval);
        choiceAnswer.style.display = "none";
        notification_timeout.style.display = "block";
        } else {
        notification_timeout.style.display = "none";
        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) +  1 * 60 * 1000);
    initializeClock('clockdiv', deadline);
    //]]>
</script>