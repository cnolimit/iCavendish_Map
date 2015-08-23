<?php
require '../config/connect.php'; 

$departmentID = mysql_real_escape_string(htmlentities(trim($_POST['departmentID'])));
$description =mysql_real_escape_string(htmlentities(trim($_POST['description'])));

$userDetatilsUpdate = mysql_query("UPDATE departments SET description = '$description' WHERE departmentID = '$departmentID'")or die(mysql_error());

header("Location: dashboard.php");


?>