<?php
session_start();

if(isset($_SESSION['STOCK_SESS_ID']) && is_numeric($_SESSION['STOCK_SESS_ID'])){
	header("Location: home.php");
	die();
	
}
require_once("Settings.php");
require_once("DatabaseConnection.php");

?>
<!DOCTYPE html>
<html lang="en">
    
<!-- the manregister.htmlby ayan ahmad 07:31:29 GMT -->
<head>
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


        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        
   
    </head>


    <body>

        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">
                <div style="background-color:rgb(68, 92, 65)" class="panel-heading"> 
                   <h3 class="text-center m-t-10"> Create a new Account </h3>
                </div> 

                <form id="regForm" class="form-horizontal m-t-40" action="RegisterController.php" method="post" enctype="multipart/form-data" >
                    <div class="form-group ">
                        <div  style="color:rgba(0,177,108,1.00)" id="regSuccess" class="col-xs-12">
                                 <strong>Your Registration has been successfully submitted.</strong> 
                        </div>
                        <strong><div style="color:rgba(207,0,3,1.00)" id="regFail" class="col-xs-12">
                                 
                        </div></strong>

                    </div>
                    
                    <div align="center" class="form-group">
                    	<img class="img-responsive" style="width:60%" src="img/Asset 17.png" />
                    </div>
			<br>
                    <div class="form-group toRemove">
                        <div class="col-xs-12">
                            <input name="r_email" class="form-control" type="email" required="" placeholder="Email">
                        </div>
                    </div>
                    
                    <div class="form-group toRemove ">
                        <div class="col-xs-12">
                            <input name="r_name" class="form-control " type="text" required="" placeholder="Full Name">
                        </div>
                    </div>

                    <div class="form-group  toRemove">
                        <div class="col-xs-12">
                            <input name="r_id" class="form-control " type="text" required="" placeholder="Ashoka ID">
                        </div>
                    </div>

                    <div class="form-group toRemove">
                        <div class="col-xs-12">
                            <input name="r_password" class="form-control " type="password" required="" placeholder="Password">
                        </div>
                    </div>

                    <?php /*?><div class="form-group  toRemove">
                        <div class="col-xs-12">
                            <input name="r_image" class="form-control " type="file" accept="image/*" required="" >
                        </div>
                    </div><?php */ ?>


                    <div class="form-group  toRemove">
                        <div class="col-xs-12">
                        </div>
                    </div>
                    
                    <div class="form-group text-right toRemove">
                        <div class="col-xs-12">
                            <button style="background-color:rgb(68, 92, 65); border:rgb(68, 92, 65) solid 1px" class="btn btn-purple w-md" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-12 text-center">
                            <a href="login.php">Click here to go back.</a>
                        </div>
                    </div>
                </form>                                  
                
            </div>
        </div>

        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
            
        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>
    <script>
$(document).ready(function (e) {
	$("#regSuccess").hide();
	$("#regFail").hide();

    $('#regForm').on('submit',(function(e) {
		$("#regSuccess").hide();
		$("#regFail").hide();
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
				if(data.trim() == "ok"){
					$("#regSuccess").fadeIn();
					$(".toRemove").fadeOut();
				}else{
					$("#regFail").fadeIn();
					$("#regFail").text(data);
				}
            },
            error: function(data){
                alert("Contact Admin.");
            }
        });
    }));

});
    </script>    
    </body>

<!-- the manregister.htmlby ayan ahmad 07:31:29 GMT -->
</html>
