<?php 

require_once("SessionHandler.php");
require_once("Settings.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");

if(!is_array($sessionGrabber)){
	$sessionGrabber = mysqlSelect("SELECT * FROM `sm_sessions` a
	where a.sess_valid =1
	order by sess_id desc 
	limit 1");
	
	if(!is_array($sessionGrabber)){
		header('Location: logout.php');
		die();
	}
		
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo BRANDING_COMPANY_LOGO_FAVICON; ?>">

        <title>Session Ended - <?php echo BRANDING_COMPANY_NAME; ?></title>


    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>End of Session Report</strong>
          </a>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Well played!! Time for a break </h1>
          <p class="lead text-muted">Results for session (<?php echo $sessionGrabber[0]['sess_id'] ?>) are displayed below, <br>
          <i>"We need to accept that we won’t always make the right decisions, that we’ll screw up royally sometimes – understanding that failure is not the opposite of success, it’s part of success."</i></p>
          <p>
<?php echo '<p><strong>Session Started</strong>: '.date('D, d M Y , h:i:s A',$sessionGrabber[0]['sess_from']).'  <br>
<strong>Session Ended</strong>: '.date('D, d M Y , h:i:s A',$sessionGrabber[0]['sess_till']).'</p><br>'; ?>

            <a href="logout.php" class="btn btn-primary my-2">Click here to Continue</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          
          <div class="row">
<?php
if (is_array($sessionGrabber)) {
		// output data of each row
		$cc =1;
###############################################################
foreach($sessionGrabber as $boxrw ) {

	$getAllUsers = mysqlSelect("SELECT * FROM `sm_logins` l where  lum_id in (
	SELECT tr_rel_lum_id FROM `sm_transactions` 
	where  tr_rel_sess_id = ".$boxrw['sess_id']." 
	group by tr_rel_lum_id
	) and  lum_ad = 0 and lum_valid =1");
		
		if(is_array($getAllUsers)){
			#getAllUsers If loop
			
			foreach($getAllUsers as $GetUser){
				#Check if user has funds in his wallet.
					$walletGrabberIndiv = mysqlSelect("SELECT *, sum(wf_val) as wf_tot FROM `sm_wallet_funds`
					where wf_valid= 1 and
					wf_rel_lum_id = ".$GetUser['lum_id']."
					group by wf_rel_lum_id");
		
					##equity bar calculation
					if(is_array($walletGrabberIndiv)){
						$equityBarArray = array();
						$openTradesIndiv = mysqlSelect("SELECT * FROM `sm_transactions` t
						left join sm_stocks s on t.tr_rel_stock_id = s.stock_id
						where tr_sell_price is null
						and s.stock_valid = 1 
						and t.tr_valid =1
						and t.tr_rel_sess_id = ".$boxrw['sess_id']." 
						and t.tr_rel_lum_id = ".$GetUser['lum_id']."");
						
						$closedTradesIndiv = mysqlSelect("SELECT * FROM `sm_transactions` t
						left join sm_stocks s on t.tr_rel_stock_id = s.stock_id
						where tr_sell_price is not null
						and s.stock_valid = 1 
						and t.tr_valid =1
						and t.tr_rel_sess_id = ".$boxrw['sess_id']." 
						and t.tr_rel_lum_id = ".$GetUser['lum_id']."");
						
						$closedTradeEquityIndiv= 0 ;
						if(is_array($closedTradesIndiv)){
							foreach($closedTradesIndiv as $closedTradeIndiv){
								$closedTradeEquityIndiv += ($closedTradeIndiv['tr_sell_price'] - $closedTradeIndiv['tr_buy_price']) * $closedTradeIndiv['tr_qty'];
							}
						}
						$allocatedMoney = 0;
						$profitOpenTrade = 0;
						if(is_array($openTradesIndiv)){
							foreach($openTradesIndiv as $openTrade){
								$allocatedMoney += $openTrade['tr_qty'] *$openTrade['tr_buy_price'];
//For Calculating Total Equity including open trades
								$profitOpenTrade += ($openTrade['tr_qty'] * $openTrade['stock_price_'.UPDATE_NUMBER]) - ($openTrade['tr_qty'] * $openTrade['tr_buy_price']);
//Not Calculating Open Trades
#								$profitOpenTrade += ($openTrade['tr_qty'] * 0) - ($openTrade['tr_qty'] * $openTrade['tr_buy_price']);
								
							}
						}
						
					
						
						$equityBarArrayi[0] = $walletGrabberIndiv[0]["wf_tot"] - $allocatedMoney + $closedTradeEquityIndiv;
						$equityBarArrayi[1] = $allocatedMoney;
						$equityBarArrayi[2] = $profitOpenTrade;
						
					}else{
						$equityBarArrayi = array(0,0,0);
					}
		
					$storeVal[] = array($GetUser['lum_name'].' ('.$GetUser['lum_email'].')',$equityBarArrayi[0]+$equityBarArrayi[1]+$equityBarArrayi[2]	);
		
			
			}#session grabber
			
			#getAllUsers If loop
			# get a list of sort columns and their data to pass to array_multisort

			$sort = array();
			foreach($storeVal as $k=>$v) {
				$sort[0][$k] = $v[0];
				$sort[1][$k] = $v[1];
			}
			# sort by event_type desc and then title asc
			array_multisort($sort[1], SORT_DESC, $sort[0], SORT_ASC,$storeVal);
	
				foreach($storeVal as $storeVa){
					echo'
			<div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">Rs . '.number_format(round(($storeVa[1])),2).'</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">'.$storeVa[0].'</small>
                  </div>
                </div>
              </div>
            </div>

';
				}

		}



}
###############################################################
} else {
	echo "No sessions Found";
}
?> 
 
 
                                        
                                 
                                        <!-- -->
                                    </div>
        </div>
      </div>

    </main>


  </body>
</html>
