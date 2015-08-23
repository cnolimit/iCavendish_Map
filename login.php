<?php
require 'config/connect.php';

if (!loggedIn()) {
?>
<html>
  <head>
    <title>Custom Street View panoramas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="google-signin-client_id" content="746117186872-bp8i1jgi8gib2fdh5ihp2fijgc1upjk6.apps.googleusercontent.com">

    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/center.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/descriptionOverlay.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css">
  </head>
  <body>
    
    <div id="navbar" class="navbar-fixed scrollspy">
      <nav  class="blue">
        <div class="nav-wrapper container">
          <div class="container"> <a href="index.php" class="brand-logo">iCavendish </a></div>
         
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
          <ul class="right hide-on-med-and-down">
           
            <li><a href="home.php">Map</a></li>
            <li><a class="head-link" href="index.php#aboutus">About Us</a></li>
            <li><a class="head-link" href="index.php#contactus">Contact Us</a></li>
            <? if (loggedIn()) {?>
              <li><a href="log_reg/logout.php">Logout</a></li>
            <?}else{
              ?><li><a href="login.php">Login</a></li><?
            }?>
            <li><a href="log_reg/dashboard.php"><img id="avImg" src="img/avatar.png" alt="" class="circle responsive-img navImg"></a> </li>
           
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
	<form name="log_form" id="log_form" action="/" method="post">
	  <div class="login_container z-depth-1">
	    <img src="img/avatar.png" alt="" class="circle responsive-img">
	      <div class="row">
		    <div class="input-field col s12">
		      <input id="username" type="text" name="username" class="validate">
		      <label for="username">Username</label>
		    </div>
		  </div>

		  <div class="row">
		    <div class="input-field col s12">
		      <input id="password" type="password" name="password" class="validate">
		      <label for="password">Password</label>
		    </div>
		  </div>
      <input class="flatButton flt" id="plan" type="submit" value="Login" onclick="checkFormLogin()">
      <br>
      <br>
      <a href="#" onclick="getRegister()">Register</a>
	  </div>
	</form>

	<form name="reg_form" id="reg_form" action="/" method="post">
	    
	    <div class="reg_container z-depth-1">
	    <img id="avImg" src="img/avatar.png" alt="" class="circle responsive-img"> 

	      <div class="row">
		    <div class="input-field col s12">
		      <input id="username" type="text" name="r_username" class="validate" required><span class="required">*</span> 
		      <label for="username">Username</label>
		    </div>
		  </div>

		  <div class="row">
		    <div class="input-field col s12">
		      <input id="password" type="password" name="r_password" class="validate" required><span class="required">*</span> 
		      <label for="password">Password</label>
		    </div>
		  </div>

	      <div class="row">
	        <div class="input-field col s12">
	          <input id="email" type="email" name="r_email" class="validate" required><span class="required">*</span> 
	          <label for="email">Email</label>
	        </div>
	      </div>

	    <input class="flatButton flt" id="plan" type="submit" value="Register" onclick="checkForm()">
      <br>
      <br>
      <a href="#" onclick="getLogin()">Login</a>
	  </div>
	</form>
<!-- 
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <a  href="#" onclick="signOut();">Sign out</a> -->
</div>
</body>


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
    <script type="text/javascript" src="js/googleLogin.js"></script>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  <script>

    var RegisterForm = document.forms["reg_form"];
    RegisterForm.style.display = "none";//start registration form hidden

    //hide registration form, show login
    function getLogin(){
      var loginForm = document.forms["log_form"];
      var RegisterForm = document.forms["reg_form"];

      loginForm.style.display = "block";
      RegisterForm.style.display = "none";
    }

    //hide login form, show registration
    function getRegister () {
      var loginForm = document.forms["log_form"];
      var RegisterForm = document.forms["reg_form"];

      loginForm.style.display = "none";
      RegisterForm.style.display = "block";
    }

    //validating registration form.
    function checkForm () {
      var RegisterForm = document.forms["reg_form"];
      var username = document.forms["reg_form"]["r_username"].value;
      var password = document.forms["reg_form"]["r_password"].value;
      var email = document.forms["reg_form"]["r_email"].value;


      $( "#reg_form" ).submit(function( event ) {
          // Stop form from submitting normally
          event.preventDefault();

      });

      //checking if any of the of the values in the form are empty 
      if ( (username == "" || username == null) || (password == "" || password == null) || (email == "" || email == null) ) {

        alert("Please complete form!");
      }else{
        document.reg_form.action = "log_reg/reg.php";
        RegisterForm.submit();
      }
    }

    //checking the login form
    function checkFormLogin () {

      var loginForm = document.forms["log_form"];
      var username = document.forms["log_form"]["username"].value;
      var password = document.forms["log_form"]["password"].value;


      $( "#log_form" ).submit(function( event ) {
          // Stop form from submitting normally
          event.preventDefault();

      });

      //checking if any of the of the values in the form are empty 
      if ( (username == "" || username == null) || (password == "" || password == null) ) {

        alert("Please complete form!");
      }else{
        document.log_form.action = "log_reg/log.php";
        loginForm.submit();
      }
    }
  </script>
</html>
<?  # code...
}else{
  header('Location: log_reg/dashboard.php');
}
?>

