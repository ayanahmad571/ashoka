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



            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                 <!-- end row -->
                <div class="row">
                    <div class="col-lg-12	">
                        <div class="panel panel-default"><!-- /primary heading -->
                            <div class="portlet-heading">
      
                            <div class="panel-heading">
                                <h3 class="panel-title">Companies</h3>
                            </div>
                            <div class="panel-body">
<div class="row">
  <form action="AdminController.php" method="post" >
     <div class="col-xs-12">
        <div class="panel panel-color panel-inverse">
            <div class="panel-heading"> 
                <h3 class="panel-title">Add new Company to Listing</h3> 
            </div> 
<div class="panel-body"> 
	    <p>Company Name: <input class="form-control" required  name="a_comp_nm" type="text" placeholder="Tata Steel " /></p>
	<hr>
		<h3>Prices</h3>
    <div class="row">
        <div class="col-xs-12">
            <input required name="stck_pr_b" placeholder="Base Price" type="text" class="form-control" />
        </div>
    <br>    
    <hr>
    
<?php 
for($rr =1;$rr<46;$rr++){
echo '
<div class="col-xs-2">
<input required name="stck_pr_up_'.$rr.'" placeholder="Update no. '.$rr.' " type="text" class="form-control" />
</div>
';

if(($rr % 6) == 0){
echo '</div><br><div class="row">';
}
}

?>            
    </div>            
</div>

                <p><input class="btn btn-success " name="a_comp_add" type="submit" value="Add Company"/></p> 
            </div> 
        </div>
     </form>
</div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                   
                                    <br>


                                    
                                    <div class="row">
                                        <!-- -->
                                         <?php
$stocksDetails = mysqlSelect("SELECT * FROM `sm_stocks` where stock_valid =1");

if (is_array($stocksDetails)) {
    // output data of each row
	$cc =1;
    foreach($stocksDetails as $boxrw ) {
		#firts loop begins
		if((($cc-1) > 0) and (($cc-1) % 3) == 0){
			echo '</div><div class="row">';
		}

		
		echo '
<div class="col-md-4">
	<div ';
			if($boxrw['stock_valid']==1){
				echo '
style="border:5px solid green" ';
			}else{
				echo'
style="border:4px solid red" ';
			}
			
			
			
			
			echo' class="panel panel-color panel-inverse">
		<div class="panel-heading"> 
			<h3 class="panel-title">'.$boxrw['stock_name'].'<span style="float:right">
		</div> 
		<div class="panel-body">  

<div class="row">
	<div class="col-xs-12 col-md-10 col-md-offset-1">
	
	<img style="width:100%" src="'.$boxrw['stock_img_src'].'" alt="'.$boxrw['stock_name'].'" />
	</div>
	</div>
	<br>


			<h2 align="center">'.$boxrw['stock_name'].'</h2> 
			
		</div> 
	</div>
</div>
                                        
	';
	
	$cc++;
	#first loop ends

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


            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

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
 	