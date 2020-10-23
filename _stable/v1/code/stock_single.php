<?php 

require_once("SessionHandler.php");
require_once("Settings.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");
if(!is_array($sessionGrabber)){
	header("Location: home.php");
	die();
	
}

if(!isset($_GET['id'])){
	header("Location: markets.php");
	die();
}

$stockSingle = mysqlSelect("select * from sm_stocks where stock_valid =1 and md5(stock_id) = '".$_GET['id']."'");
if(!is_array($stockSingle)){
	header("Location: markets.php");
	die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo BRANDING_COMPANY_LOGO_FAVICON; ?>">

        <title><?php echo BRANDING_COMPANY_NAME; ?></title>
      

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
  <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        
    </head>


    <body>

        <!-- Aside Start-->
        <aside class="left-panel">

            
<!-- brand -->
<?php 

getLogoForAdmin();
?>
<!-- / brand -->
            
            <?php 
			getModules();
			?>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
                <!-- Left navbar -->
                <nav class=" navbar-default" role="navigation">
                    

                    <!-- Right navbar -->
<ul class="nav navbar-nav navbar-right top-menu top-right-menu">  
                        <!-- mesages -->  
                       
                        <!-- Notification -->
                        <li class="dropdown">
                        </li>
                       
                        <!-- /Notification -->

                        <!-- user login dropdown start-->
                        <li class="dropdown text-center">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="<?php echo $USER_ARRAY['lum_img_src']; ?>" src="<?php echo $USER_ARRAY['lum_img_src']; ?>" class="img-circle profile-img thumb-sm">
                                <span class="username"><?php echo ucwords($USER_ARRAY['lum_name']) ?> </span> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                <hr>

                        
                        
                            </ul>
                        </li>
                        <!-- user login dropdown end -->       
                    </ul>
                    
                    <!-- End right navbar -->
                </nav>
                
            </header>
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">

<div class="row">
	<div class="col-12" style="margin-left:25px;margin-left:25px; margin-bottom:10px; background-color:rgba(255,255,255,1.00); padding:5px">
        <div class="progress">
          <div id="theprogressbar" class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="180" aria-valuemin="0" aria-valuemax="180" style="width: 100%">
          </div>
        </div>    
    </div>
</div>

    
    <div class="col-md-4">
                        <div class="panel panel-default">
<div class="panel-heading">
<h4>Open Trade</h4>
</div>
                           <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form method="post" action="ClientController.php">
                                    <input type="hidden" name="buy_stock_id" value="<?php echo md5($stockSingle[0]["stock_id"]) ?>" />
                                    <table class="table table-hover">
                                            <tbody>
                                            <?php if (isset($_GET['err'])){ ?>
                                            	<tr>
                                                	<td colspan="2" style="color:rgba(211,0,3,1.00)"><strong>Trade Could not be opened</strong></td>

                                                </tr>
                                                <?php } ?>
                                            	<tr>
                                                	<td><strong>Maximum</strong>: </td>
                                                    <td><?php echo number_format(floor($equityBar[0]/$stockSingle[0]["stock_price_".$sessionUpdateNumber])) ?> Units</td>
                                                </tr>
                                            	<tr>
                                                	<td><strong>Units</strong>: </td>
                                                    <td><input autocomplete="off" required name="buy_stock_qty" type="number" class="form-control input-lg" placeholder="522" min="1" max="<?php echo number_format(floor($equityBar[0]/$stockSingle[0]["stock_price_".$sessionUpdateNumber])) ?>" /></td>
                                                </tr>
                                                <tr align="center">
                                                	<td colspan="2"><button type="submit" class="btn btn-primary" btn-lg>Open Trade</button></td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-md-8">
                        <div class="panel panel-default">
                           <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>MARKET</th>
                                                    <th>PREVIOUS BID</th>
                                                    <th>CURRENT BID</th>
                                                    <th>CHANGE</th>
                                                </tr>
                                            </thead>
                                            <tbody id="pageLiveTable">
                                            <?php
											
												if(is_array($stockSingle)){
													foreach($stockSingle as $stock){
														$sk_name = $stock['stock_name'];
														$sk_img = $stock['stock_img_src'];
														$sk_open = $stock['stock_price_'.($sessionUpdateNumber == 1 ? 1:($sessionUpdateNumber-1))];
														$sk_bid = $stock['stock_price_'.$sessionUpdateNumber];
														$sk_url = "stock_single.php?id=".md5($stock['stock_id']);

														if($sk_bid > $sk_open){
															$description = array("green","fa fa-caret-up");
														} else if($sk_bid < $sk_open){
															$description = array("red","fa fa-caret-down");
														}else{
															$description = array("grey","");
														}

														?>
        <tr>
            <td>
        <a  href="<?php echo $sk_url; ?>">
            	<div class="row" >
                	<div class="col-xs-3" >
                    	<img src="<?php echo $sk_img; ?>" class=" img-responsive" width="60px">
					</div>
                    <div align="left" class="col-xs-9">
                    	<strong><?php echo $sk_name ;?></strong><br>
                        <p>-</p>
                    </div>
                </div>
         </a>
            </td>
            <td>
        <a  href="<?php echo $sk_url; ?>">
					<?php echo number_format(round($sk_open,2),2); ?>
                </a>
			</td>
            <td>
        <a  href="<?php echo $sk_url; ?>">
					<?php echo number_format(round($sk_bid,2),2); ?>
                </a>
            </td>
            <td align="left">
        <a  href="<?php echo $sk_url; ?>">
                    <em style="color:<?php echo $description[0]; ?>;">
                        <i class="<?php echo $description[1]; ?>" style="color:<?php echo $description[0]; ?>;">
                             
                        </i>
                        <?php echo number_format(round($sk_bid-$sk_open,2),2) ; ?> <br>
                        (<?php echo number_format(round(((($sk_bid-$sk_open)*100)/($sk_open)),2),2) ; ?>%)
                    </em>
			</a>
			</td>
       
        </tr>
                                                
                                                        <?php
													}
												}
											?>
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        	<h4>Current/Past Holdings </h4>
                        </div>
                           <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>MARKET</th>
                                                    <th>UNITS (BUY)</th>
                                                    <th>OPEN</th>
                                                    <th>CURRENT BID</th>
                                                    <th>INVESTED</th>
                                                    <th>VALUE</th>
                                                    <th>P/L</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="pageTableMain">
                                            <?php
											
											$stocksData = mysqlSelect("SELECT * FROM `sm_transactions` t 
left join sm_stocks s on t.tr_rel_stock_id = s.stock_id 
WHERE 
s.stock_valid = 1 
and t.tr_valid =1
and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
and t.tr_rel_lum_id = ".$USER_ARRAY['lum_id']."
and t.tr_rel_stock_id = '".$stockSingle[0]["stock_id"]."'
order by  t.tr_sell_price");
												if(is_array($stocksData)){
													foreach($stocksData as $stock){
														$sk_name = $stock['stock_name'];
														$sk_img = $stock['stock_img_src'];
														$sk_open = $stock['tr_buy_price'];
														$sk_bid = $stock['tr_sell_price'];
														
														$row_bg = "background-color: rgba(148,148,148,1.00); color: white";
														$closedorno = "TRADE CLOSED";

														if($stock['tr_sell_price'] == null){
															$row_bg = "color: grey;";
															$sk_bid = $stock['stock_price_'.$sessionUpdateNumber];
															$closedorno = "-";

														}
																												
														if($sk_bid > $sk_open){
															$description = array("green","fa fa-caret-up");
														} else if($sk_bid < $sk_open){
															$description = array("red","fa fa-caret-down");
														}else{
															$description = array("grey","");
														}

														?>
        <tr style=" <?php echo $row_bg ?>">
            <td>
            	<div class="row" >
                	<div class="col-xs-3" >
                    	<img src="<?php echo $sk_img; ?>" class=" img-responsive" width="60px">
					</div>
                    <div align="left" class="col-xs-9">
                    	<strong><?php echo $sk_name ;?></strong><br>
                        <p style="color:rgba(255,232,28,1.00) "><?php echo $closedorno ?></p>
                    </div>
                </div>
				<?php if(is_null($stock['tr_sell_price'])){ ?>
                <div class="row">
                	<form action="ClientController.php" method="post">
                    	<input type="hidden" value="<?php echo md5($stock['tr_id']) ?>" name="trade_close" />
                        <button type="submit" class="btn btn-danger"> Close Trade</button>
                    </form>
                </div>
                <?php } ?>
            </td>
            <td>
					<?php echo number_format(round($stock['tr_qty'],2),2); ?>
            </td>
            <td>
					<?php echo number_format(round($sk_open,2),2); ?>
            </td>
            <td>
					<?php echo number_format(round($sk_bid,2),2); ?>
            </td>
            <td>
					<?php echo number_format(round(($sk_open * $stock['tr_qty'] ),2),2); ?>
            </td>
            <td style="color:<?php echo $description[0] ?>">
					<?php echo number_format(round((($sk_bid) * $stock['tr_qty'] ),2),2); ?>
            </td>
            <td style="color:<?php echo $description[0] ?>">
					<?php echo number_format(round((($sk_bid-$sk_open) * $stock['tr_qty'] ),2),2); ?>
            </td>
       
        </tr>
                                                
                                                        <?php
													}
												}
											?>
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                </div> <!-- End Row -->

            <!-- Page Content Ends -->
            <!-- ================== -->
<br>
<br>
<br>
<br><HR>
<br>

            <!-- Footer Start -->
            <footer style="position:fixed; background-color:rgba(255,255,255,1.00); padding:5px !important" class="footer">
            <div id="pageEquityBar" class="row" align="center">
                <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round($equityBar[0],2),2); ?></h3>
                    <p>AVAILABLE</p>
                </div>
                <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round($equityBar[1],2),2); ?></h3>
                    <p>TOTAL ALLOCATED</p>
                </div>
                <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round($equityBar[2],2),2); ?></h3>
                    <p>UNREALIZED GAINS</p>
                </div>
                <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round(($equityBar[0] + $equityBar[1] + $equityBar[2]),2),2); ?></h3>
                    <p>EQUITY</p>
                </div>
            </div>

            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
  

   <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>

        <!-- Counter-up -->
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="js/jquery.app.js"></script>
        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>
        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>

<script type="text/javascript">
	$(document).ready(function(e) {
	
	setInterval(function()
	{ 
		$.ajax({
		  type:"post",
		  data:{'getStockLive':'<?php echo md5($stockSingle[0]['stock_id']) ?>'},
		  url:"ClientController.php",
		  success:function(data)
		  {
			$("#pageLiveTable").html(data);
			  //do something with response data
		  }
		});
	}, 5000);//time in milliseconds 
	});
</script>   
<script type="text/javascript">
	$(document).ready(function(e) {
	
	setInterval(function()
	{ 
		$.ajax({
		  type:"post",
		  data:{'getStockTrades':'<?php echo md5($stockSingle[0]['stock_id']) ?>'},
		  url:"ClientController.php",
		  success:function(data)
		  {
			$("#pageTableMain").html(data);
			  //do something with response data
		  }
		});
	}, 5000);//time in milliseconds 
	});
</script>   

<script type="text/javascript">
	$(document).ready(function(e) {
	
	setInterval(function()
	{ 
		$.ajax({
		  type:"post",
		  data:{'getEquityUpdate':'news'},
		  url:"ClientController.php",
		  success:function(data)
		  {
			$("#pageEquityBar").html(data);
			  //do something with response data
		  }
		});
	}, 5000);//time in milliseconds 
	});
</script>

<script>
	$(document).ready(function() {
var tracker = <?php echo $nextUpdateIn ?>;
setInterval(function(){
	if(tracker == 0){
		tracker = <?php echo INTERVAL_I ?>;
	}else{
		tracker--;
	}
	$('#theprogressbar').attr('aria-valuenow', tracker).css('width', ((tracker/180)*100)+'%');
	$('.countdowner').html(tracker);

}, 1000);

	});
</script>


<script>
$(document).ready(function() {
    setTimeout(function() {
		window.location = "session_completed.php?id=";
		}, <?php echo  ($sessionGrabber[0]['sess_till'] - time())* 1000 ?>);
});
</script>



    </body>

</html>
