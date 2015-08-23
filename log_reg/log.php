<?php 
session_start();

//Call file to connect to database
require '../config/connect.php';


$username =mysql_real_escape_string(htmlentities(trim($_POST['username'])));
$password =mysql_real_escape_string(htmlentities(trim($_POST['password'])));

//Hashing the password
$MPassword = md5($password);



$query = mysql_query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$MPassword'")or die(mysql_error());
$row = mysql_num_rows($query);

if ($row > 0) {
	$_SESSION['isLoggedIn'] = true;
	$_SESSION['username'] = $username;
	goToDash();
}else{
	session_destroy();
	backToLogin();
}
function backToLogin(){

    header( "Refresh:2; url=../login.php", true, 303);
	echo "User does not exist!";
    exit;
}
function goToDash(){
	header( "Refresh:2; url=dashboard.php", true, 303);
	echo "Login Succesful";
    exit;
}

?>