<?php
require_once("SessionHandler.php");
require_once("Settings.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");


if($USER_ARRAY['lum_ad'] == 0){
	die('Invalid Page.');
}

if(isset($_POST['fund_add'])){
	$cN = array('add_wlt_fund_usrid','add_funds_fund');
checkPost($cN);

	if(is_numeric($_POST[$cN[1]]) && ctype_alnum($_POST[$cN[0]])){
		if(!inRange($_POST[$cN[1]],0,10000000,true)){
			die("One Time wallet size must be between Rs. 0 and 1 Crore");
		}
		
		$userDetails = mysqlSelect("select * from sm_logins where md5(md5(sha1(md5(concat('erjfgviuerdhghvex',lum_id))))) = '".$_POST[$cN[0]]."'");
		
		if(!is_array($userDetails)){
			die('User Not Found');
		}
		
		$insertFunds=  mysqlInsertData("INSERT INTO `sm_wallet_funds`(`wf_rel_lum_id`, `wf_gen_rel_lum_id`, `wf_val`) VALUES (
'".$userDetails[0]['lum_id']."',
'".$USER_ARRAY['lum_id']."',
'".$_POST[$cN[1]]."'
)", true);

		if(is_numeric($insertFunds)){
			header('Location: admin_funds.php');
			die();
		}else{
			die($insertFunds);
		}
		
	}else{
		die('Invalid Input');
	}
		
}
#
if(isset($_POST['sess_add'])){
	$sessChecker = mysqlSelect("SELECT * FROM `sm_sessions` a
where a.sess_from <= '".(time())."' and a.sess_till >= '".time()."' and a.sess_valid =1");
if(is_array($sessChecker)){
	die("Session in progress");
}
	
	$sessFrom = time();
	$sessTill = $sessFrom + UPDATE_NUMBER * INTERVAL_I;
	$insertData = mysqlInsertData("INSERT INTO `sm_sessions`(`sess_gen_rel_lum_id`, `sess_gen_dnt`, `sess_from`, `sess_till`) VALUES (
	'".$USER_ARRAY['lum_id']."',
	'".time()."',
	'".$sessFrom."',
	'".$sessTill."')", true);
	
	if(is_numeric($insertData)){
		header('Location: admin_session.php');
	}else{
		die($insertData);
	}
}
#
if(isset($_POST['hash_ffipa'])){
	if(!ctype_alnum(trim($_POST['hash_ffipa']))){
		die('Invalid Entries');
		
	}
	if(ctype_alnum(trim($_POST['hash_ffipa']))){
		
		$checkit = mysqlSelect("select * from sm_sessions 
		where md5(sha1(md5(concat('woi4jhfoiehrguijvnes',sess_id))))= 
		'".$_POST['hash_ffipa']."' and sess_valid = 1");
		
		if(is_array($checkit)){
			$insertData = mysqlInsertData("update sm_sessions set sess_valid =0 where sess_id= ".$checkit[0]['sess_id'], true);
			if(is_numeric($insertData)){				
								header('Location: admin_session.php');
			}else{
				die('Couldt Insert Data');
			}
		}else{
			die("Invalid Session");
		}
		
		
	}


}
#companies
#news


if(isset($_POST['buy_stock']) and isset($_POST['buy_stock_stp'])){
	if(isset($_SESSION['STCK_USR_DB_ID'])){
	}else{
		die('You Must be logged <br>
<a href="login.php"><button>Click to Login</button></a>');
	}
	
	
	
	if(is_numeric($_POST['buy_stock'])){
		$qty = $_POST['buy_stock'];
	}else{
		die('Stock qty has to be numeric');
	}
	
	
	if(ctype_alnum($_POST['buy_stock_stp'])){
		$hash = $_POST['buy_stock_stp'];
		
		$getdata = getdatafromsql($conn,"select * from sm_stocks_price_rel where md5(sha1(md5(md5(concat(stp_id,'hbrhugu8hi3re9ui3hefug3irefgir29oiwh4g38ohu5egr3i5ehgru'))))) = '".trim($hash)."' and stp_valid =1");
		if(!is_array($getdata)){
			die("Could not find the price");
		}

	}else{
		die('Stock qty has to be numeric');
	}
	
$getwallet = "select * from p_balance where wf_rel_lum_id = ".$_SESSION['STCK_USR_DB_ID']."
";


			$getwallet = getdatafromsql($conn,$getwallet);
			
			if(!is_array($getwallet)){
				die("Could not load your wallet amount");
			}
			
			
			if(($getwallet['wf_balance']) < ($qty*$getdata['stp_val'])){
				die('Not enough funds');
			}
			
			if(!isset($_SESSION['STCK_USR_DB_ID'])){
				die('Login to continue');
			}
			
			
			if($conn->query("INSERT INTO `sm_transactions`(
			`tr_rel_stck_id`, `tr_rel_lum_id`,
			 `tr_rel_stp_id`, `tr_qty`, 
			 `tr_time`, `tr_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )")){
##### Insert Logs ##################################################################VV3###
		if(preplogs($getdata,$_SESSION['STCK_USR_DB_ID'],'sm_transactions','insert', "INSERT INTO `sm_transactions`(
			`tr_rel_stck_id`, `tr_rel_lum_id`,
			 `tr_rel_stp_id`, `tr_qty`, 
			 `tr_time`, `tr_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGsezfdTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

				 
				 header('Location: markets.php');
			}else{
				die('ERRMAOI4WJGF38EIRGHNO');
			}
	
}
if(isset($_POST['sell_stock']) and isset($_POST['sell_stock_stp'])){
	if(isset($_SESSION['STCK_USR_DB_ID'])){
	}else{
		die('You Must be logged <br>
<a href="login.php"><button>Click to Login</button></a>');
	}
	
	
	
	if(is_numeric($_POST['sell_stock'])){
		$qty = $_POST['sell_stock'];
	}else{
		die('Stock qty has to be numeric');
	}
	
	
	if(ctype_alnum($_POST['sell_stock_stp'])){
		$hash = $_POST['sell_stock_stp'];
		
		$getdata = getdatafromsql($conn,"select * from sm_stocks_price_rel where md5(sha1(md5(md5(concat(stp_id,'hbrhugu8hi3re9ui3hefug3irefgir29oiwh4g38ohu5eg3i5ehgru'))))) = '".trim($hash)."' and stp_valid =1");
		if(!is_array($getdata)){
			die("Could not find the price");
		}

	}else{
		die('Stock qty has to be numeric');
	}
	
			
			if(!isset($_SESSION['STCK_USR_DB_ID'])){
				die('Login to continue');
			}
			
			
			
			
			$getsellab = "select sum(tr_qty) as sellab from sm_transactions 
			where tr_valid =1 and 
			tr_rel_stck_id = ".$getdata['stp_rel_stck_id']."
			and
			tr_rel_lum_id = ".$_SESSION['STCK_USR_DB_ID']."
			group by tr_rel_stck_id
";


			$getsellab = getdatafromsql($conn,$getsellab);
			
			if(!is_array($getsellab)){
				echo '0';
			}
			
			
			
				$getsold = "select sum(ts_qty) as sellab from sm_transactions_sell 
			where ts_valid =1 and
			ts_rel_stck_id = ".$getdata['stp_rel_stck_id']."
			and 
			ts_rel_lum_id = ".$_SESSION['STCK_USR_DB_ID']."
			group by ts_rel_stck_id
";


			$getsold = getdatafromsql($conn,$getsold);
			
			if(!is_array($getsold)){
				$getisold = 0;
			}else{
				$getisold = $getsold['sellab'];
			}
			
			
			if($getsold > $getsellab){
				die('You don\'t have enough to sell ');
			}
			
			
			if($conn->query("INSERT INTO `sm_transactions_sell`(
			`ts_rel_stck_id`, `ts_rel_lum_id`,
			 `ts_rel_stp_id`, `ts_qty`, 
			 `ts_time`, `ts_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )")){
##### Insert Logs ##################################################################VV3###
		if(preplogs($getdata,$_SESSION['STCK_USR_DB_ID'],'sm_transactions_sell','insert', "INSERT INTO `sm_transactions_sell`(
			`ts_rel_stck_id`, `ts_rel_lum_id`,
			 `ts_rel_stp_id`, `ts_qty`, 
			 `ts_time`, `ts_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGsezfdTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

				 
				 header('Location: markets.php');
			}else{
				die('ERRMAOI4WJGF38EIRGHNO');
			}
	
}
##
if(isset($_POST['switch_user_status'])){

	if($USER_ARRAY["lum_ad"] != 1){
		die("Only Administrators may be allowed.");
	}
	if(!ctype_alnum($_POST['switch_user_status'])){
		die("Invalid");
	}
	$getAccount = mysqlSelect("select * from sm_logins where md5(md5(sha1(sha1(md5(md5(concat(lum_id,'AlphaRomeo197RY9'))))))) = '".$_POST['switch_user_status']."'");
	
	if(!is_array($getAccount)){
		die("Cant Find User");
	}
	$setnew = 0;
	
	if($getAccount[0]['lum_valid'] == 0){
		$setnew = 1;
	}
	$updateSql = mysqlUpdateData("update `sm_logins` set lum_valid = ".$setnew." where lum_id = ".$getAccount[0]['lum_id'], true);
		if(is_numeric($updateSql)){
			header("Location: admin_user.php");
			die();
		}else{
				die($insertData);
		}
}




?>
