<?php
//Call file to connect to database
require 'config/connect.php';
include 'functions.php';
//include 'search.php';


$start = mysql_real_escape_string(htmlentities(trim($_POST['start'])));
$end =mysql_real_escape_string(htmlentities(trim($_POST['end'])));
$journeyImages =mysql_real_escape_string(htmlentities(trim($_POST['journeyImages'])));
$path =mysql_real_escape_string(htmlentities(trim($_POST['path'])));
$id =mysql_real_escape_string(htmlentities(trim($_POST['id'])));


	echo getImageLocation($journeyImages).",".getPanoRef($journeyImages) .",".getTitle(getID($journeyImages)).",".getDescription($path).",".$id;

	function getEdge($imageID)
	{
		$imageIdSearch = mysql_query("SELECT * FROM `images` WHERE `ImageID` = '$imageID' ")or die(mysql_error());
	
		while ($row = mysql_fetch_assoc($imageIdSearch)) {
			$edge = $row['edge'];

		}
		return $edge;
	}

	function getID($edge)
	{
		$imageSearch = mysql_query("SELECT * FROM `images` WHERE `edge` = '$edge' ")or die(mysql_error());
	
		while ($row = mysql_fetch_assoc($imageSearch)) {
			$ImageID = $row['ImageID'];

		}
		return $ImageID;
	}

	function getImageLocation($edge)
	{
		$imageSearch = mysql_query("SELECT * FROM `images` WHERE `edge` = '$edge' ")or die(mysql_error());
	
		while ($row = mysql_fetch_assoc($imageSearch)) {
			$ImageLocation = $row['imageLocation'];

		}
		return $ImageLocation;
	}

	function getPanoRef($edge)
	{
		$imageSearch = mysql_query("SELECT * FROM `images` WHERE `edge` = '$edge' ")or die(mysql_error());
	
		while ($row = mysql_fetch_assoc($imageSearch)) {
			$panoRef = $row['panoRef'];

		}
		return $panoRef;
	}
	function getTitle($ImageID){

		$findTitle = mysql_query("SELECT * FROM `places` WHERE `ImageID`  = '$ImageID' ")or die(mysql_error());

		while ($row = mysql_fetch_assoc($findTitle)) {
			
			$title = $row['title'];


		}
		return $title;

	}
	function getDescription($pathEdge){

		$findDescription = mysql_query("SELECT * FROM `links` WHERE `edgeConnect`  = '$pathEdge' ")or die(mysql_error());

		while ($row = mysql_fetch_assoc($findDescription)) {
			
			$description = $row['Description'];


		}
		return $description;

	}


?>
