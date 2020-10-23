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

            <div class="wraper container-fluid">
                <div class="row">
                    

                    <div class="col-lg-12	">

                        <div class="panel panel-default"><!-- /primary heading -->
                            <div class="portlet-heading">
      
                            <div class="panel-heading">
                                <h3 class="panel-title">Users</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <!-- -->

                               <?php

$boxsql = "SELECT * FROM `sm_logins`";
$boxres = $conn->query($boxsql);

if ($boxres->num_rows > 0) {
    // output data of each row
	$cc =1;
    while($boxrw = $boxres->fetch_assoc()) {
		#firts loop begins
		if($boxrw['lum_valid'] == 1){
					
					$give = '
					<form action="AdminController.php" method="post">
				<input name="switch_user_status" type="hidden" value="'.md5(md5(sha1(sha1(md5(md5($boxrw['lum_id'].'AlphaRomeo197RY9')))))).'" />
					<input type="submit" class="btn btn-danger m-t-20" value="Disable" />
					</form>
		';			$bg = 'info';
					


		}else{
					
					
					$give = '<form action="AdminController.php" method="post">
				<input name="switch_user_status" type="hidden" value="'.md5(md5(sha1(sha1(md5(md5($boxrw['lum_id'].'AlphaRomeo197RY9')))))).'" />
					<input type="submit" class="btn btn-success m-t-20" value="Enable" />
					</form>
					';
					$bg = 'danger';
							
			
		}
		
		
		
		if($boxrw['lum_ad'] == 0){
			$admi_p = 'Not Admin';
		}else{
			$admi_p= 'Admin';
		}
		

		
		echo '
<div class="col-sm-4">
	<!-- Start Profile Widget -->
	<div style="border:1px grey solid" class="profile-widget text-center">
		<div class="bg-'.$bg.' bg-profile"></div>
		<img src="'.$boxrw['lum_img_src'].'" class="thumb-lg img-circle img-thumbnail" alt="img">
		<h3>'.$boxrw['lum_name'].'</h3>
		'.($boxrw['lum_id'] == 1 ? "<br><br><br>" : $give).'
		<ul class="list-inline widget-list clearfix">
			<li class="col-md-4"><span>'.$boxrw['lum_name'].'</span>Name</li>
			<li class="col-md-4"><span>'.$admi_p.'</span>Admin</li>
			<li class="col-md-4"><span>'.$boxrw['lum_ad_level'].'</span>Admin Level</li>
			<li class="col-md-6"><span>'.$boxrw['lum_username'].'</span>Username</li>
			<li class="col-md-6"><span>'.$boxrw['lum_password'].'</span>Password</li>
		</ul>
	</div>
	<!-- End Profile Widget -->
</div>

                                        
	';
	if(($cc % 3) == 0){
		echo '</div><div class="row">';
	}
	$cc++;
	#first loop ends
	$munsclaimed = 'None';
    }
} else {
    echo "0 results";
}
 ?> 
 
 
                                        
                                 
                                        <!-- -->
                                    </div>
                                     </div>
                                </div>
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
 	
