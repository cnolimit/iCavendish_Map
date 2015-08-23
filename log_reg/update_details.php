<?php
require '../config/connect.php'; 

$fname = mysql_real_escape_string(htmlentities(trim($_POST['fname'])));
$lname =mysql_real_escape_string(htmlentities(trim($_POST['lname'])));
$email = mysql_real_escape_string(htmlentities(trim($_POST['email'])));
$userID = mysql_real_escape_string(htmlentities(trim($_POST['userID'])));

$userDetatilsUpdate = mysql_query("UPDATE users SET lname = '$lname', email = '$email', fname = '$fname' WHERE userID = '$userID'")or die(mysql_error());

header("Location: dashboard.php");


?>