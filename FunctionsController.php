<?php
require_once("Settings.php");
function checkPost($htmlname){
	if(is_array($htmlname)){
		foreach($htmlname as $name){
			if(!isset($_POST[$name])){
				die("Invalid ".$name);
			}
			
		}
	}else{
		if(!isset($_POST[$htmlname])){
			die("Invalid ".$htmlname);
		}
	}
}

function checkEmail($email){
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  die("Invalid email format");
	}
}

function genHash($email, $pass){
	return md5(md5(sha1($email."-H0Q8347THMC44283TH7M-".$pass)));
}

function uploadImage($fnm){
	$fileInternalName = $fnm;
	$target_dir = "img/user_uploads/";
	$path_t  =pathinfo($_FILES[$fnm]["name"]);
	$target_file = $target_dir.md5(time()).rand(1,111).".".$path_t["extension"];
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$errorRows = "<br>Image error";

// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES[$fnm]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $errorRows .=  "<br>File is not an image.";
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
  $errorRows .= "<br>Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES[$fnm]["size"] > 500000) {
  $errorRows .=  "<br>Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $errorRows .=  "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $errorRows .=  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES[$fnm]["tmp_name"], $target_file)) {
    return array(1,$target_file);
  } else {
    $errorRows .=  "<br>Sorry, there was an error uploading your file.";
	return array(0,$errorRows );
  }
}

}

function loginMakeSession($uid){
	session_start();
	session_destroy();
	session_start();
	$_SESSION['STOCK_SESS_ID'] = $uid;
	
}

function getNumericalSession($sessionStart, $timenow, $number){
	#only call this if the upper limit has already been checked.
	if($timenow >= $sessionStart){
		return getNumericalSession($sessionStart,$timenow - INTERVAL_I, $number+1);
	}else{
		return $number;
	}
}

function getModules(){
		$_USER = $GLOBALS["USER_ARRAY"];
					if($_USER['lum_ad'] ==1){
						$sql = "SELECT * FROM `sm_modules` WHERE `mo_ifadmin`=1 and mo_valid =1 and mo_min_ad_level <= ".$_USER['lum_ad_level'];
		
					}else{
						$sql = "SELECT * FROM `sm_modules` WHERE `mo_ifnoadmin`=1  and mo_valid =1";
		
					}
				
		$results = mysqlSelect($sql);
			if (is_array($results)) {
					// output data of each row
					echo '<!-- Navbar Start -->
							<nav class="navigation">
								<ul class="list-unstyled">';
				foreach($results as $row ) {
													
						  if(trim(basename($_SERVER['PHP_SELF'])) == trim(basename($row['mo_href'])) ){
								echo '<li class="active"><a href="#"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span></a></li>';
								}else{
								echo '<li ><a href="'.$row['mo_href'].'"><i class="'.$row['mo_icon'].'"></i> <span class="nav-label">'.$row['mo_name'].'</span></a></li>';
							}
										
				}
								
								
								#wile end
					echo '</ul>
						</nav>';
										
									#big if end
			}else{
				echo "No Tabs open";
			}
		
}

function inRange($number, $min, $max, $inclusive = FALSE)
{
    if (is_numeric($number) && is_numeric($min) && is_numeric($max))
    {
        return $inclusive
            ? ($number >= $min && $number <= $max)
            : ($number > $min && $number < $max) ;
    }

    return false;
}

function getLogoForAdmin(){
	echo
	'            <div class="logo">
                
				<a href="https://bodhicapital.in/" class="logo-expanded" target="_blank">
<img src="img/Asset 15.png" class="img-responsive" style="max-width:30px" />
                </a>
            </div>
';
}

?>
