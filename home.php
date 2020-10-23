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
            <?php 
			if(is_array($sessionGrabber)){
				
				
			?>





                 <!-- End row -->


<div class="row">
	<div class="col-12" style="margin-left:25px;margin-left:25px; margin-bottom:10px; background-color:rgba(255,255,255,1.00); padding:5px">
        <div class="progress">
          <div id="theprogressbar" class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="180" aria-valuemin="0" aria-valuemax="180" style="width: 100%"></div>
        </div>    
    </div>
</div>
 
                <div class="row">
                    <div class="col-lg-4">

                        <!-- TODO -->
                        <div class="portlet" id="todo-container"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rules
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet-5" class="panel-collapse collapse in">
                                <div class="portlet-body todoapp">
                                   
                                   <ul>
<li>The competition will be held in a controlled simulation on a custom-made platform that has been tried and tested to ensure reliability and speed (unlike the course registration portal).</li>
<li>Each participant will have to register on the platform and their login credentials will only be approved on successful receipt of the payment.</li>
<li>Each participant is allocated Rs. 1,00,000 in their equity account that they can use to buy different stocks and will be allowed to sell whenever they wish to.</li>
<li>Companies across different sectors of the Indian equity market have been chosen and news updates reflect closely with the existing business environment.</li>
<li>There are two main tabs that the participant will access- the market tab and the portfolio tab. The market tab allows the participant to observe all the available securities and their prices and price changes (if any). The portfolio tab will show the positions and the value that the participants maintain as well as the positions that they have exited.</li>
<li>There will be a total of 17 news updates that will be released at an interval of 3 minutes.</li>
<li>Participants can choose to buy or sell stocks in the interval between the news updates. Each update will change the price of the securities and the same can be seen on the platform.</li>
<li>Participants can see their realized gain/loss as well as their unrealized gain/loss and remaining equity on the tab at the bottom of their screen.</li>
<li>Participants will be allowed to purchase as many units as they want through their equity, provided they have sufficient available, but will have to sell the entire position at once at any given time</li>
<li>It will be on the participants to ensure that they have a strong network connection for the entire duration of the event. The developer or the organizers will not be liable for any dispute arising out of a disrupted network connection on the side of the participant and no refund will be made for the same.</li>
                                   </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

            <div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>News </h4>
            <div align="left" id="page_timer">
            <h5 style="color:grey">Next news update in <strong style="color:maroon" class="countdowner"><?php echo $nextUpdateIn; ?></strong> seconds</h5>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>News Article</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                    
                                            <tbody id="pageNews">
                                                    
                                            <?php
											$limited = 1;
$sql = "SELECT * from sm_news where nw_valid =1 and nw_up_pos = ".$sessionUpdateNumber." order by nw_id DESC LIMIT  ".$limited;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$co = 1;
    while($row = $result->fetch_assoc()) {
		if($co == 1){
			$badger = '<span class="label label-success fli_go_a_5_S">NEW</span>';
		}else{
			$badger = '';
		}
        ?>
        <tr>
                        <td><?php echo $row['nw_text'] ; ?></td>
                        <td><?php echo date('h:i A',($sessionGrabber[0]["sess_from"]+ (120*(1-$sessionUpdateNumber)))) ?></td>
                        <td><?php echo $badger ?></td>
        </tr>
        <?php
		$co++;
    }
} else {
    ?>
    
  <tr><td colspan="3">Please sell all your stocks, End of session in 3 minutes.</td></tr>  
    <?php
}
 ?> 
                                                
                                            </tbody>
                                        </table>

                </div>
            </div>
        </div>
    </div>
</div>

                    <div class="row">
                    
                    
                    </div>
                </div> <!-- End row -->


            </div><?php }else{
				?>
                 <div class="row">
 
                     <div class="col-lg-12">

                        <!-- TODO -->
                        <div class="portlet" id="todo-container"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Message from the team
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet-5" class="panel-collapse collapse in">
                                <div class="portlet-body todoapp">
                                   
Thank you for your interest in Bodhi Capital. The session will begin shortly.

                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->


 </div>     


                <div class="row">
                <div class="col-lg-4">

                        <!-- TODO -->
                        <div class="portlet" id="todo-container"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rules
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet-5" class="panel-collapse collapse in">
                                <div class="portlet-body todoapp">
                                   
                                   <ul>
<li>The competition will be held in a controlled simulation on a custom-made platform that has been tried and tested to ensure reliability and speed (unlike the course registration portal).</li>
<li>Each participant will have to register on the platform and their login credentials will only be approved on successful receipt of the payment.</li>
<li>Each participant is allocated Rs. 1,00,000 in their equity account that they can use to buy different stocks and will be allowed to sell whenever they wish to.</li>
<li>Companies across different sectors of the Indian equity market have been chosen and news updates reflect closely with the existing business environment.</li>
<li>There are two main tabs that the participant will access- the market tab and the portfolio tab. The market tab allows the participant to observe all the available securities and their prices and price changes (if any). The portfolio tab will show the positions and the value that the participants maintain as well as the positions that they have exited.</li>
<li>There will be a total of 17 news updates that will be released at an interval of 3 minutes.</li>
<li>Participants can choose to buy or sell stocks in the interval between the news updates. Each update will change the price of the securities and the same can be seen on the platform.</li>
<li>Participants can see their realized gain/loss as well as their unrealized gain/loss and remaining equity on the tab at the bottom of their screen.</li>
<li>Participants will be allowed to purchase as many units as they want through their equity, provided they have sufficient available, but will have to sell the entire position at once at any given time</li>
<li>It will be on the participants to ensure that they have a strong network connection for the entire duration of the event. The developer or the organizers will not be liable for any dispute arising out of a disrupted network connection on the side of the participant and no refund will be made for the same.</li>
                                   </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                <div class="col-md-4">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           <img class="img-responsive" src="img/Asset 17.png" />
                        </div>
                            <div class="panel-body">
                                <div class="row">
                                
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h4>About Bodhi Capital</h4>
                                    <p>Bodhi Capital is a premier undergraduate student managed investment fund of Ashoka University founded with the vision of producing superior risk adjusted returns through equity research based on fundamental analysis.  
<br><br>
Bodhi Capital was founded and incorporated as a partnership firm in March 2019. The fund is led by a team of four partners who work with four portfolio managers and sixteen analysts to make key investment decisions based on bottom up fundamental analysis. It is supervised by ABC Investments, the investments club of Ashoka University that consists of finance enthusiasts who are committed to establishing an investment ethos at Ashoka and regularly meet to discuss stock picks and investment philosophies. </p>
                                    </div>
                                </div>
                            </div>
                                                            <div class="clearfix"></div>
                                <hr/>
                                <ul class="social-links list-inline p-b-10">
                                    <li>
<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://bodhicapital.in" data-original-title="URL"><i class="fa fa-globe"></i></a>
                                    </li>
                                    <li>
<a href="https://www.instagram.com/abc_investments/" title="" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Instagram"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://www.linkedin.com/company/bodhicap" data-original-title="Bodhi Capital LinkedIn"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://www.linkedin.com/company/abc-investments-club" data-original-title="ABC Investment Club LinkedIn"><i class="fa fa-linkedin"></i></a>
                                    </li>

                                </ul>

                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="panel">
                            <div class="panel-body p-t-10">
                                <div class="media-main">
                                    <a class="pull-left" href="#">
                                        <img class="thumb-lg img-circle bx-s" src="img/user_uploads/8bb5ceb6c3eed95be48c13d4a2709c7941.JPG" alt="">
                                    </a>
                                    <div class="info">
                                        <h4>Ayan Ahmad</h4>
                                        <p class="text-muted">Software Developer/ Founder at Aethn Aega</p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr/>
                                <p>I, <strong>Ayan Ahmad</strong>, am a Web developer with five years of experience in various industries. <br>
                                After multiple projects I finally decided to take my skills to a platform to faciliate customer interaction through Aethn Aega. In the world where customer is king, as part of Aethn Aega and a developer, I feel obliged to provide my clients with tailor made solutions for their needs. Being a small and young platform, we only have one priority, "you".<br><br>
Feel free to connect with me for all your software development needs.
</p>
                                <div class="clearfix"></div>
                                <hr/>
                                <ul class="social-links list-inline p-b-10">
                                    <li>
<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="http://aethnaega.com" data-original-title="URL"><i class="fa fa-globe"></i></a>
                                    </li>
                                    <li>
<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://www.facebook.com/aethnaega/" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
<a href="https://www.instagram.com/aethnaega/" title="" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Instagram"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://www.linkedin.com/in/ayan-ahmad/" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="https://api.whatsapp.com/send?phone=971559523302" data-original-title="Whatsapp"><i class="fa fa-whatsapp"></i></a>
                                    </li>
                                    <li>
        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="mailto:aethnaega@gmail.com" data-original-title="Email"><i class="fa fa-envelope-o"></i></a>
                                    </li>
                                </ul>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- end col -->
</div>
                
                <?php
			}?>
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


 
	<script src="assets/fullcalendar/moment.min.js"></script>
    <script src="assets/fullcalendar/fullcalendar.min.js"></script>
   <?php 
			if(is_array($sessionGrabber)){
  ?> 
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
		window.location = "session_completed.php?id=123123123";
		}, <?php echo  ($sessionGrabber[0]['sess_till'] - time())* 1000 ?>);
});
</script>

<?php
}
?> 
   



 
<script type="text/javascript">
	$(document).ready(function(e) {
	
	setInterval(function()
	{ 
		$.ajax({
		  type:"post",
		  data:{'getNewsUpdate':'news'},
		  url:"ClientController.php",
		  success:function(data)
		  {
			$("#pageNews").html(data);
			  //do something with response data
		  }
		});
	}, 5000);//time in milliseconds 
	});
</script> 



    </body>

</html>
