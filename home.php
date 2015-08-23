<?php
//Call file to connect to database
require 'config/connect.php';

  function getTitle($ImageID){

    $findTitle = mysql_query("SELECT * FROM `places` WHERE `ImageID`  = '$ImageID' ")or die(mysql_error());

    while ($row = mysql_fetch_assoc($findTitle)) {
      
      $title = $row['title'];


    }
    return $title;

  }

?>

<html>
  <head>
    <title>Custom Street View panoramas</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.min.css">
    

    <!--Import jQuery before materialize.js-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Materialize JavaScript -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/materialize.js"></script>

    <!-- Map JavaScript Functions -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="js/journey.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/application.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/CustomMap.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/JourneyPlanner.js" type="text/javascript" charset="utf-8"></script>
  </head>
<script>

</script>
  <body onload="Overlay.createOverlay();">
    <!-- <input value="click me" onclick="setTimeout(virtualTour(), 5000);"> -->
    <!-- The card displaying the image information -->
      <div id="card" class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img id="card_img" class="activator" src="">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><h id="card_title_in" >Card Title </h> <i class="mdi-navigation-more-vert right"></i></span>
          <p><a href="#">This is a link</a></p>
          <div class="cardBtn">close</div>
        </div>
        <div class="card-reveal">
          <span  class="card-title grey-text text-darken-4"><h id="card_title_out"> </h><i class="mdi-navigation-close right"></i></span>
          <br><p id="card_description"></p>
          <br><p id="card_operating_times"></p>
        </div>

      </div>

      <!-- <button id="play" onclick="start()">Click Me</button> -->

    <div id="navbar" class="navbar-fixed scrollspy">
      <nav  class="blue">
        <div class="nav-wrapper container">
          <div class="container"> <a href="index.php" class="brand-logo">iCavendish </a></div>
         
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
          <ul class="right hide-on-med-and-down">
           
            <li><a href="home.php">Map</a></li>
            <li><a class="head-link" href="index.php#aboutus">About Us</a></li>
            <li><a class="head-link" href="index.php#contactus">Contact Us</a></li>
            <? if (loggedIn()) {//check is user is logged in?>
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
            <? if (loggedIn()) {//check is user is logged in?>
              <li><a href="log_reg/logout.php">Logout</a></li>
            <?}else{
              ?><li><a href="login.php">Login</a></li><?
            }?>
          </ul>
        </div>
      </nav>
    </div>

    <!-- Container for the enitre center of page -->
    <div id="container">


      <!-- Left side of the page displaying journey breakdown -->
      <div id="journey_box">
        <div id="head"><h2>Journey Directions <i class="mdi-hardware-keyboard-backspace"></i></h2> </div>
        <div class"close"></div>

        <!-- Start of a journey panel -->
        <div class="journey_panel">
          <i class="fa  fa-street-view"></i>

          <!-- Title -->
          <h1>University of Westminster </h1>
          <h2>115 New Cavendish Street London W1W 6UW</h2>
          <span class="linebar"></span>
          <br>
        </div>

        <!-- This will trigger the journey plan-->
          <div id="search_bar">
              <input type="text" class="search" id="search" name="search" placeholder="Search Location..."/><br>
              <div id="results"></div>
              <div id="selected_journey"></div>
              <div class="flatButton flt" id="plan">Journey Planner </div>
          </div>
        <br>

        <form action="/" name="journeyForm" id="journeyForm">

          <select name="start" id="start">
            <option value="" disabled selected>Start Location</option>
            <?php
                //Retrieving location list from the database
                $locations = mysql_query("SELECT * FROM `images`")or die(mysql_error());
              
                while ($row = mysql_fetch_assoc($locations)) {

                  ?><option value="<?echo $row['edge']?>"><?echo getTitle($row['ImageID'])?></option><?
                }
            ?>
          </select>

          <select name="end" id="end">
            <option value="" disabled selected>End Location</option>
            <?php
                //Retrieving location list from the database
                $locations = mysql_query("SELECT * FROM `images`")or die(mysql_error());
              
                while ($row = mysql_fetch_assoc($locations)) {

                  ?><option value="<?echo $row['edge']?>"><?echo getTitle($row['ImageID'])?></option><?
                }
            ?>
          </select>
          <input type="hidden" id="journeyImages" type="text" >
          <input class="flatButton" id="subpl2" type="submit" name="submit" value="Submit" onclick="getPath();">
          <div class="flatButton flt" id="plan2"> Back </div>
        </form>

        <div class="pre-circle preloader-wrapper big active">
          <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div><div class="gap-patch">
              <div class="circle"></div>
            </div><div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
        </div>


        <div class=" hide flatButton flt"> Back </div>
        <div id="journ"></div>

        <!-- This button is used to change the image-->
        <input type="hidden" id="clickBtn" type="button">


        <!-- Start of a journey panel -->
        <div class="journey_panel_list">
          <i class="fa  fa-street-view"></i><br>
          <!-- Title -->
          <span class="linebar"></span><br>
          <h1>University of Westminster Polyclinic</h1>
          <h2>115 New Cavendish Street London W1W 6UW</h2>
          <span class="linebar"></span>
        </div>
      </div>


      <!-- Right side box containing navigation map  -->
      <div id="map_box">
        <a class="btn-floating btn-large waves-effect waves-light blue btnMap"><i class="fa  fa-location-arrow"></i></i></a>
        <div id="map-canvas"><div id="infoTab"></div></div>
        
      </div>
    </div>

  <form>
    <div id="descriptionOverlay">
      <div id="btnClose" class="btn-floating">X</div>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue darken-1 ">
            <div class="card-content white-text">
            <?php
              $locations = mysql_query("SELECT * FROM `images` WHERE `ImageID`  = '$ImageID' ")or die(mysql_error());
            
              while ($row = mysql_fetch_assoc($locations)) {

              }
            ?>
              <span class="card-title">Card Title</span>
              <div id="test"><?echo "HERE>>"."<script>document.write(Map.getPano());</script>"."<<<<"?></div>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href='#'>This is a link</a>
            </div>


          </div>
        </div>
      </div>
    </div>
  </form>


  <div id="pull_tab" onclick=""><i class="fa fa-angle-double-up"></i></div>
  <footer class="page-footer blue lighten-1">
    <div class="footer-copyright">
      <div class="container">
       <p>Copyright © iCavendish.com</p>
      </div>
    </div>
  </footer>



    <script src="js/search.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">

      function start(){
        alert("yolo");
        setTimeout(function() {
          Map.selectImage('img_04');
            $('#clickBtn').trigger('click');
        }, 3000);

      }

      function showCard(img, title, des, times){

        $("#card").toggle();

        title1 = document.getElementById('card_title_out');
        title2 = document.getElementById('card_title_in');
        image = document.getElementById("card_img");
        description = document.getElementById("card_description");
        operatingTimes = document.getElementById("card_operating_times");

        title1.innerHTML = title;
        title2.innerHTML = title;
        image.src = img;
        description.innerHTML = des;
        operatingTimes.innerHTML = times;
        

        $("#card").fadeIn();
        console.log(img +","+title+","+des);
      }
      $(function(){

        $(".cardBtn").click(function(){
          $("#card").animate({height:'toggle'},550);
        });

      });

      google.maps.event.addDomListener(window, 'load', Map.initialize);

      var currentPano = Map.getPano();
      var test = document.getElementById('test');

      // test.innerHTML = currentPano;
    </script>

  </body>
</html>
      