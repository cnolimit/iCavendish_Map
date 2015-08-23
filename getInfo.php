<?php
//Call file to connect to database
require 'config/connect.php';
include 'functions.php';

$panoImage =mysql_real_escape_string(htmlentities(trim($_POST['panoImage'])));
$panoRef = mysql_real_escape_string(htmlentities(trim($_POST['infoDescription'])));

var $ID = getID($panoImage);

var $body = getBody($ID);
var $title = getTitle($ID);
echo $title." ".$body;

	function getID($panoImage)
	{
		$imageIdSearch = mysql_query("SELECT * FROM `images` WHERE `panoRef` = '$panoImage' ")or die(mysql_error());
	
		while ($row = mysql_fetch_assoc($imageIdSearch)) {
			$ImageID = $row['ImageID'];

		}
		return $ImageID;
	}

	function getBody($ImageID){

		$findTitle = mysql_query("SELECT * FROM `information` WHERE `ImageID`  = '$ImageID' ")or die(mysql_error());

		while ($row = mysql_fetch_assoc($findTitle)) {
			
			$body = $row['body'];


		}
		return $body;

	}

	function getLinks($ImageID){

		$findTitle = mysql_query("SELECT * FROM `information` WHERE `ImageID`  = '$ImageID' ")or die(mysql_error());

		while ($row = mysql_fetch_assoc($findTitle)) {
			
			$links = $row['links'];


		}
		return $links;

	}

	function getTitle($ImageID){

		$findTitle = mysql_query("SELECT * FROM `information` WHERE `ImageID`  = '$ImageID' ")or die(mysql_error());

		while ($row = mysql_fetch_assoc($findTitle)) {
			
			$title = $row['title'];


		}
		return $title;

	}


?>
    <div id="descriptionOverlay">
      <div id="btnClose" class="btn-floating">X</div>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue darken-1 ">
            <div class="card-content white-text">
              <span class="card-title"><?echo getTitle(getID($panoRef))?></span>
              <div id="test"><?echo "HER  >>".getPan()."<<<<"?></div>
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