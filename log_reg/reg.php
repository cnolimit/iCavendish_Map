<?php 
//Call file to connect to database
require '../config/connect.php';

$username =mysql_real_escape_string(htmlentities(trim($_POST['r_username'])));
$password =mysql_real_escape_string(htmlentities(trim($_POST['r_password'])));
$email =mysql_real_escape_string(htmlentities(trim($_POST['r_email'])));

//Hashing the password
$MPassword = md5($password);



if (checkIfExist($username) ) {
		mysql_query("INSERT INTO `users` (`userID`, `username`, `password`, `email`) VALUES (NULL, '$username', '$MPassword', '$email')")or die(mysql_error());
		echo "<script> window.location.replace('../login.php'); </script>";

}else{
	backToLogin();
}

//delete blank entries into the database
deleteBlankEntries();

function checkIfExist($user)
{
	$query = mysql_query("SELECT * FROM `users`")or die(mysql_error());
	while ($row = mysql_fetch_assoc($query)) {
      
      if (strtoupper($row['username']) == strtoupper($user)) {
      	return false;
      }

    }
    return true;
}

function deleteBlankEntries()
{
	$query = mysql_query("DELETE FROM `users` WHERE `password` = 'd41d8cd98f00b204e9800998ecf8427e' ")or die(mysql_error());
}
function backToLogin(){

    header( "Refresh:2; url=../login.php", true, 303);
	echo "Already Registered!";
    exit;
}

?>