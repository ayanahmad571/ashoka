<?php
session_start();
if(isset($_SESSION['STOCK_SESS_ID']) && is_numeric($_SESSION['STOCK_SESS_ID'])){
	header("Location: home.php");
	die();
	
}
session_destroy();
require_once("Settings.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");

$checkerNames = array("l_email","l_password");
# 0 = email
# 1 = password
checkPost($checkerNames);
checkEmail($_POST[$checkerNames[0]]);

$userHash = genHash($_POST[$checkerNames[0]],$_POST[$checkerNames[1]]);

$makeSess = mysqlSelect("select * from sm_logins where lum_email = '".$_POST[$checkerNames[0]]."' and lum_hash =  '".$userHash."' and lum_password = '".$_POST[$checkerNames[1]]."' and lum_valid = 1 
limit 1  ");
if(is_array($makeSess)){
	loginMakeSession($makeSess[0]["lum_id"]);
	die("ok");
}else{
	die("Invalid Login, Please try again");
}



?>	