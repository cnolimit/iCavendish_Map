<?php
//connect to database 
mysql_connect("localhost", "root", "root");
mysql_select_db("iCavendish");

session_start();

function loggedIn()
{
	if ($_SESSION['isLoggedIn'] == 1) {
		return true;
	}else{
		return false;
	}
}

?>