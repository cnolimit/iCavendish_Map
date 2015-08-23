<?php
require '../config/connect.php'; 

$username = $_SESSION['username'];
$query = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

$row = mysql_fetch_assoc($query);
  $username = $row['username'];
  $userID = $row['userID'];
  $fname = $row['fname'];
  $lname = $row['lname'];
  $email = $row['email'];
  $section = $row['sectionID'];

if (loggedIn()) {
?>
<html>
  <head>
    <title>Custom Street View panoramas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <link rel="stylesheet" type="text/css" href="../css/materialize.css">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/center.css">
    <link rel="stylesheet" type="text/css" href="../css/search.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/descriptionOverlay.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.3.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.3.0/css/font-awesome.min.css">
  </head>
  <body>

    <div id="navbar" class="navbar-fixed scrollspy">
      <nav  class="blue">
        <div class="nav-wrapper container">
          <div class="container"> <a href="../index.php" class="brand-logo">iCavendish </a></div>
         
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
          <ul class="right hide-on-med-and-down">
           
            <li><a href="../home.php">Map</a></li>
            <li><a class="head-link" href="../index.php#aboutus">About Us</a></li>
            <li><a class="head-link" href="../index.php#contactus">Contact Us</a></li>
            <? if (loggedIn()) {?>
              <li><a href="logout.php">Logout</a></li>
            <?}else{
              ?><li><a href="../login.php">Login</a></li><?
            }?>
            <li><a href="dashboard.php"><img id="avImg" src="../img/avatar.png" alt="" class="circle responsive-img navImg"></a> </li>
           
          </ul>
          <ul class="right side-nav" id="mobile-demo">
            <li><a href="home.php">Map</a></li>
            <li><a class="head-link" href="index.php#aboutus">About Us</a></li>
            <li><a class="head-link" href="index.php#contactus">Contact Us</a></li>
            <? if (loggedIn()) {?>
              <li><a href="log_reg/logout.php">Logout</a></li>
            <?}else{
              ?><li><a href="login.php">Login</a></li><?
            }?>
          </ul>
        </div>
      </nav>
    </div>

    <div class="container">
      <form action="update_details.php" name="user_details" method="post">
        <!-- User details  -->
        <h1 style="color:black;">Update Details</h1>
        <div class="row">
          <form class="col s12">

            <div class="row">
              <div class="input-field col s6">
                <input value="<?echo $fname?>" name="fname" id="first_name" type="text" class="validate">
                <label for="first_name">First Name</label>
              </div>

              <div class="input-field col s6">
                <input value="<?echo $lname?>" name="lname" id="last_name" type="text" class="validate">
                <label for="last_name">Last Name</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input value="<?echo $email?>" name="email" id="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>
            </div>

            <input type="hidden" name="userID" value="<?echo $userID?>">
            <input class="flatButton flt" id="plan" type="submit" value="Update">
          </form>
        </div>
      </form>



      <?php
        if ($section != null) {
          $sectionQuery = mysql_query("SELECT * FROM departments WHERE departmentID = '$section'")or die(mysql_error());
          $departmentRow = mysql_fetch_assoc($sectionQuery);
          $departmentID = $departmentRow['departmentID'];
          $title = $departmentRow['title'];
          $description = $departmentRow['description'];
          $times = $departmentRow['operatingTimes'];
          ?>
          <form action="update_department.php" name="user_details" method="post">
            <!-- Department details  -->
            <h1 style="color:black;"><?echo $title?> Group</h1>
            <div class="row">
              <form class="col s12">
                <div class="row">

                  <div class="input-field col s6">
                    <textarea id="des_area" name="description"><?echo $description?></textarea>
                    <label for="description">Description</label>
                  </div>

                  <div class="input-field col s7">
                    <input class="validate" type="text" name="opTimes" value="<?echo $times?>"/>
                    <label for="opTimes">Operating Hours</label>
                  </div>


                <input type="hidden" name="departmentID" value="<?echo $departmentID?>">
                <input class="flatButton flt" id="plan" type="submit" value="Update">
              </form>
            </div>
          </div>
          </form>
          <?
        }
      ?>

    </div><!-- end of container -->



  <!-- The footer area -->
  <footer class="page-footer blue lighten-1">
   
    <div class="footer-copyright">
      <div class="container">
       <p>Copyright © Your website name</p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="../js/googleLogin.js"></script>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
  <script>
    if (LoggedIn()) {
      window.location.replace('../login.php');
    }
  </script>
</html>
<?  # code...
}else{
  header('Location: ../login.php');
}
?>