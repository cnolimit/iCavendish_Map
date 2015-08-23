<?php

/**This function will retrive any image relating to the 
ID passed through within the argument**/
public function getImageLocation($imgId){

	$imageIdSearch = mysql_query("SELECT * FROM `images` WHERE `ImageID` = '$imgId' ");
	
	while ($row = mysql_fetch_assoc($imageIdSearch)) {
		$imageLocation = $row['imageLocation'];
	}
	return $imageLocation;
}

function loadPath(){

	$pathSearch = mysql_query("SELECT * FROM `paths` WHERE `PathID` = '1' ");
	
	while ($row = mysql_fetch_assoc($imageIdSearch)) {
		$path = explode("," , $row['route']);
	}
	return $imageLocation;

}


?>