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

$checkerNames = array("r_email","r_name","r_id","r_password");
# 0 = email
# 1 = name
# 2 = username
# 3 = password

checkPost($checkerNames);
checkEmail($_POST[$checkerNames[0]]);
if(is_array(mysqlSelect("select * from sm_logins where lum_email = '".$_POST[$checkerNames[0]]."' "))){
	die('An Account with the same email already exists.');
}
if(is_array(mysqlSelect("select * from sm_logins where lum_username = '".$_POST[$checkerNames[2]]."' "))){
	die('An Account with the same username already exists.');
}

/*
$fileURL = uploadImage('r_image');
if($fileURL[0] == 1){
	$fileURLPath = $fileURL[1];
}else{
	die($fileURL[1]);
}
*/
$userHash = genHash($_POST[$checkerNames[0]],$_POST[$checkerNames[3]]);


$insertData = mysqlInsertData("INSERT INTO `sm_logins`(`lum_name`, `lum_img_src`, `lum_email`, `lum_username`, `lum_password`,  `lum_hash`, `lum_ad`, `lum_ad_level`, `lum_valid`) VALUES 
	('".$_POST[$checkerNames[1]]."', 'img/user_uploads/c7db1017db05217ca869099d58e559bc67.jpg', '".$_POST[$checkerNames[0]]."', '".$_POST[$checkerNames[2]]."', '".$_POST[$checkerNames[3]]."', '".$userHash."', 0, 0, 0)");
if(trim($insertData) == "#"){
	die("ok");
}else{
	if(!is_numeric($insertData)){
		die($insertData);
	}
}



?>