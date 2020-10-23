<?php
require_once("SessionHandler.php");
require_once("Settings.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");


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
                                <li><a href="myca.php"><i class="fa fa-briefcase"></i>Profile</a></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                <hr>
                                 <li style="color:red">
<p>                                                   Logged In ip: <?php echo $_SERVER['REMOTE_ADDR'] ?>
<br>
Logged in user: <?php echo $USER_ARRAY['lum_username'] ?><br>

Admin : <?php 
if($USER_ARRAY["lum_ad"] == 1){
	echo 'Yes';
}else{
	echo 'No';
}

?></p>
                        </li>
                        
                        
                        
                            </ul>
                        </li>
                        <!-- user login dropdown end -->       
                    </ul>
                    
                    <!-- End right navbar -->
                </nav>
                
            </header>
            <!-- Header Ends -->
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">


                 <!-- end row -->

                <div class="row">
                    

                    <div class="col-lg-12	">

                        <div class="panel panel-default"><!-- /primary heading -->
                            <div class="portlet-heading">
      
                            <div class="panel-heading">
                                <h3 class="panel-title">Wallet Funds</h3>
                            </div>
                            <div class="panel-body">
<div class="row">
                                        <!-- -->
 <?php
 $usersDB = mysqlSelect("SELECT * FROM `sm_logins` where lum_valid = 1 and lum_ad = 0  order by lum_name asc");
 
 if(is_array($usersDB)){
     foreach($usersDB as $userIndiv){
		 $getUserFund = mysqlSelect("SELECT *, sum(wf_val) as wf_tot FROM `sm_wallet_funds`
where wf_valid= 1 and
wf_rel_lum_id = ".$userIndiv['lum_id']."
group by wf_rel_lum_id");
$walletAmount = "-";

if(is_array($getUserFund)){
	$walletAmount = number_format($getUserFund[0]["wf_tot"]);
}
     ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                        <img class="thumb-lg img-circle bx-s" src="<?php echo $userIndiv['lum_img_src'] ?>" alt="">
                                    <div class="info">
                                        <h4><?php echo $userIndiv['lum_name'] ?></h4>
                                        <p class="text-muted"><?php echo $userIndiv['lum_email'] ?></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <h3>Rs. <?php echo $walletAmount; ?></h3>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- end col -->
                    

		<?php } # Foreach ?>
                                             
 </div>

 <div class="row">
 <div class="col-md-12">
	<div class="panel panel-color panel-inverse">
		<div class="panel-heading"> 
			<h3 class="panel-title">Add Wallet Funds</h3> 
		</div> 
		<div class="panel-body"> 
			<p>User: 
  <form action="AdminController.php" method="post" >
          <select class="form-control" required name="add_wlt_fund_usrid" >
            
            <?php
     foreach($usersDB as $userIndiv){
        ?>
        <option value="<?php echo md5(md5(sha1(md5('erjfgviuerdhghvex'.$userIndiv['lum_id'])))) ?>">
        <?php echo $userIndiv['lum_name'] ?></option>
        <?php
    }
 ?> 
            </select>
            
            
</p>	
<p>Amount to be added: <input class="form-control"  required  name="add_funds_fund" type="number" max="10000000" min="0" placeholder=" Upto 1 crore" /></p> 
<p><input class="btn btn-success "   name="fund_add" type="submit" value="Add Funds"/></p> 
		 </form>

        </div> 
	</div>
</div>
</div>                                             
                                             <?php

}else{
	echo "No Users Found";
}
 ?> 


                            </div>
                        </div>
                    </div> <!-- end col -->

                    
                </div> <!-- End row -->


            </div> <!-- End row -->


            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            
            <!-- Footer Start -->
            
 
            
                  <!-- Footer Start -->
                        <footer class="footer">

  Aethn Aega for Ashoka Univeristy
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

    </body>

</html>
 	