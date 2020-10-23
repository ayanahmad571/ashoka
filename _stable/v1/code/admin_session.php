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
                                <h3 class="panel-title"><?php echo BRANDING_COMPANY_NAME ?> Simulation Session Management</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php
	$sessChecker = mysqlSelect("SELECT * FROM `sm_sessions` a
	left join sm_logins b on b.lum_id = a.sess_gen_rel_lum_id
	where a.sess_from <= '".(time())."' and a.sess_till >= '".time()."' and a.sess_valid =1 and b.lum_valid = 1");

if(is_array($sessChecker)){
    // output data of each row
	$done = round((((time() - trim($sessChecker[0]['sess_from']))/(trim($sessChecker[0]['sess_till']) - trim($sessChecker[0]['sess_from'])))*100),1)
	  ?>
<div class="col-md-12">
        
        
<div class="row">
	<div class="col-12" style="margin-left:25px;margin-left:25px; margin-bottom:10px; background-color:rgba(255,255,255,1.00); padding:5px">
        <div class="progress">
          <div id="theprogressbar" class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" 
          aria-valuenow="<?php echo ($sessChecker[0]['sess_till'] - time()) ?>" 
          aria-valuemin="0" 
          aria-valuemax="<?php echo INTERVAL_I * UPDATE_NUMBER ?>" 
          style="width: <?php echo (($sessChecker[0]['sess_till'] - time())/ (INTERVAL_I * UPDATE_NUMBER))*100 ?>%"></div>
        </div>    
    </div>
</div>

                                
                          
        <div class="row">                          
            <strong>Time left (s)</strong>: <strong id="TimeLeftID"><?php echo ($sessChecker[0]['sess_till'] - time()) ?></strong> seconds<br>
            <strong>Update Number </strong>: <strong id="UpdateNumberID"><?php echo $sessionUpdateNumber ?></strong>                                
        </div>
    <br>

                <div class="row" id="SessionManager">
                    <form action="AdminController.php" method="post">
                        <input  type="hidden" name="hash_ffipa" value="<?php echo md5(sha1(md5('woi4jhfoiehrguijvnes'.$sessChecker[0]['sess_id']))) ?>"/>
                        <button type="submit" class="btn btn-danger btn-lg">Stop Session</button>
                    </form>
                </div>
    
    <hr>
	
</div>

    <?php

}else{
	?>
    <form action="AdminController.php" method="post" >      
    <div class="col-md-12">
        <div class="panel panel-color panel-inverse">
            <div class="panel-heading"> 
                <h3 class="panel-title">Add Session</h3> 
            </div> 
            <div class="panel-body"> <!--
                <p>Starting in: <input class="form-control" required name="sess_in_min" type="text" placeholder="Minutes to start this new session after eg:10" /></p> -->
                <p><input class="btn btn-success "   name="sess_add" type="submit" value="Add Session"/></p> 
            </div> 
        </div>
    </div>
    </form>
 <?php
}
 ?> 
 </div>
 </div>
                                        <div class="row">
<?php
	$sessChecker2 = mysqlSelect("SELECT * FROM `sm_sessions` a
	left join sm_logins b on b.lum_id = a.sess_gen_rel_lum_id
	where  b.lum_valid = 1
	order by sess_till desc
	");
	if (is_array($sessChecker2)) {
		// output data of each row
		$cc =1;
		foreach($sessChecker2 as $boxrw ) {
			if($cc == 1){
				$lates= ' (Latest)';
			}else{
				$lates = '';
			}
			#firts loop begins
			echo '
	<div class="col-md-6">
		<div ';
				if($boxrw['sess_valid']==1){
					echo '
	style="border:1px solid green" ';
				}else{
					echo'
	style="border:1px solid red" ';
				}
				echo' class="panel panel-color panel-inverse">
			<div class="panel-heading"> 
				<h3 class="panel-title">'.$boxrw['sess_id'].' '.$lates.'<span style="float:right">
				</span></h3> 
			</div> 
			<div class="panel-body"> 
				<p><strong>Started by</strong>: '.$boxrw['lum_name'].'</p> 
				<p><strong>Session From</strong>: '.date('D, d M Y , h:i:s A',$boxrw['sess_from']).'  <br>
	<strong>Session Till</strong>: '.date('D, d M Y , h:i:s A',$boxrw['sess_till']).'</p><br>
<p><strong>Session generated on</strong>: '.date('D, d M Y , h:i:s A',$boxrw['sess_gen_dnt']).'</p> 
				<p>
				';
				if($boxrw['sess_valid']==1){
					echo '
	<hr style="border-bottom:6px solid green;border-radius:5px">';
				}else{
					echo'
	<hr style="border-bottom:6px solid red;border-radius:5px">';
				}
				echo'
				</p>
				
			</div> 
		</div>
	</div>
											
		';
		if(($cc % 2) == 0){
			echo '</div><div class="row">';
		}
		$cc++;
		#first loop ends
		}
	} else {
		echo "No sessions Found";
	}
?> 
 
 
                                        
                                 
                                        <!-- -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    
                </div> <!-- End row -->


            </div> <!-- End row -->

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

<?php
if(is_array($sessChecker)){
?>
    <script>
	$(document).ready(function() {
var tracker = <?php echo ($sessChecker[0]['sess_till'] - time()) ?>;
setInterval(function(){
	if(tracker == 0){
		$("#SessionManager").html("<h3>Session Ended</h3>");
	}else{
		tracker--;
	}
	$('#theprogressbar').attr('aria-valuenow', tracker).css('width', ((tracker/<?php echo INTERVAL_I * UPDATE_NUMBER ?>)*100)+'%');
	$('#TimeLeftID').html(tracker);

}, 1000);

	});
</script>

<?php
}

?>
    </body>

</html>
 	
