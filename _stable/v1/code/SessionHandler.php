<?php

require_once("DatabaseConnection.php");
require_once("FunctionsController.php");

session_start();
/* 
	1. check if logged in 
	2. check if page is admin page
	3. check if admin has started the session.
	4. get wallet amount 
*/
#Check is the user has logged in or no.
if(isset($_SESSION['STOCK_SESS_ID']) && is_numeric($_SESSION['STOCK_SESS_ID'])){
	$resp = mysqlSelect("SELECT * FROM `sm_logins` where lum_valid =1 and lum_id = ".$_SESSION['STOCK_SESS_ID']);
	if(!is_array($resp)){
		die("(Account Not Found <a href='logout.php'><button>Re-login</button></a>)");
	}
	$USER_ARRAY = $resp[0];
}else{

	header("Location: login.php");
	die();
}

/*
	Here after can only be accessed if logged in.
*/

#Check if this page is admin only and kick out non admins
$pageViewChecker = mysqlSelect("select * from sm_modules where mo_valid =1 and mo_href = '".basename($_SERVER['PHP_SELF'])."'");

if(is_array($pageViewChecker[0])){
	if($pageViewChecker[0]['mo_ifnoadmin'] == 0){
		if($USER_ARRAY['lum_ad'] == 0){
			die("Only Administrators may view this page");
		}
	}
}


#Check if user has funds in his wallet.
$walletGrabber= mysqlSelect("SELECT *, sum(wf_val) as wf_tot FROM `sm_wallet_funds`
where wf_valid= 1 and
wf_rel_lum_id = ".$USER_ARRAY['lum_id']."
group by wf_rel_lum_id");

#Check if a session has been started, stored in an array.
$sessionGrabber = mysqlSelect("SELECT * FROM `sm_sessions` a
where a.sess_from <= '".(time())."' and a.sess_till >= '".time()."' and a.sess_valid =1");
if(is_array($sessionGrabber)){
	$sessionUpdateNumberRaw = getNumericalSession($sessionGrabber[0]['sess_from'], time(),0);
	$sessionUpdateNumber = (($sessionUpdateNumberRaw >18) ? 18:$sessionUpdateNumberRaw);
	$nextUpdateIn = (($sessionGrabber[0]['sess_from'] + ($sessionUpdateNumber*INTERVAL_I)) - time());
	##equity bar calculation
	if(is_array($walletGrabber)){
		$equityBar = array();
		$openTrades = mysqlSelect("SELECT * FROM `sm_transactions` t
		left join sm_stocks s on t.tr_rel_stock_id = s.stock_id
		where tr_sell_price is null
		and s.stock_valid = 1 
		and t.tr_valid =1
		and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
		and t.tr_rel_lum_id = ".$USER_ARRAY['lum_id']."");
		
		$closedTrades = mysqlSelect("SELECT * FROM `sm_transactions` t
		left join sm_stocks s on t.tr_rel_stock_id = s.stock_id
		where tr_sell_price is not null
		and s.stock_valid = 1 
		and t.tr_valid =1
		and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
		and t.tr_rel_lum_id = ".$USER_ARRAY['lum_id']."");
		
		$closedTradeEquity= 0 ;
		if(is_array($closedTrades)){
			foreach($closedTrades as $closedTrade){
				$closedTradeEquity += ($closedTrade['tr_sell_price'] - $closedTrade['tr_buy_price']) * $closedTrade['tr_qty'];
			}
		}
		$openTradeEquity = 0;
		$allocatedMoney = 0;
		$profitOpenTrade = 0;
		if(is_array($openTrades)){
			foreach($openTrades as $openTrade){
				$allocatedMoney += $openTrade['tr_qty'] *$openTrade['tr_buy_price'];
				$profitOpenTrade += ($openTrade['tr_qty'] * $openTrade['stock_price_'.$sessionUpdateNumber]) - ($openTrade['tr_qty'] * $openTrade['tr_buy_price']);
				
			}
		}
		
	
		
		$equityBar[0] = $walletGrabber[0]["wf_tot"] - $allocatedMoney + $closedTradeEquity;
		$equityBar[1] = $allocatedMoney;
		$equityBar[2] = $profitOpenTrade;
		
	}else{
		$equityBar = array(0,0,0);
	}

}else{
	#closed trades amout in variable here
	#open trades amount in varibles here
	
}











?>