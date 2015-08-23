<?php
//Call file to connect to database
require 'config/connect.php';

/**This function will retrive any image relating to the 
ID passed through within the argument**/
function getImageLocation($imgId){

	$imageIdSearch = mysql_query("SELECT * FROM `images` WHERE `ImageID` = '$imgId' ")or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($imageIdSearch)) {
		$imageLocation = $row['imageLocation'];
		$panoRef = $row['panoRef'];

		$data = array('panoRef' => $panoRef,'imageLocation' => $imageLocation );
	}
	return $data;
}

function loadPath(){

	$pathSearch = mysql_query("SELECT * FROM `paths` WHERE `PathID` = '1' ") or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($imageIdSearch)) {
		$path = explode("," , $row['route']);
	}
	for ($i=0; $i < count($path); $i++) { 
		?><script type="text/javascript">alert(<?echo($path[$i]); ?>);</script><?
	}
	return $path;

}


//Collect the search item from serach.js
$search = mysql_real_escape_string(htmlentities(trim($_POST['searchterm'])));

//Query the 'Places' the user may be trying to select
$find_place = mysql_query("SELECT * FROM `departments` WHERE `title` LIKE '%$search%' ")or die(mysql_error());

//Check if any results are returned
while ($row = mysql_fetch_assoc($find_place)) {
	
	$title = $row['title'];
	$des = $row['description'];
	$imgLocation = $row['image'];
	$times = $row['operatingTimes'];

	//setting up the html element to be displayed back on to the page when user searches
	echo "" ?> 
				<div id="displayArea" onclick="showCard(<? echo "'".$imgLocation."'" ?>,
					<? echo "'".$title."'" ?>,<? echo "'".strval($des)."'" ?>,<? echo "'".$times."'" ?>)">
					<i class="fa  fa-map-marker "></i> 
					<p><? echo $title ?></p>
				</div>
			<? ;
}
//to turn them into button so that you can begin to generate a journey,
//add a form element so that the tile can be clicked.


?>

