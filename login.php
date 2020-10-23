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
                <div class="panel-heading"  style="background-color:rgb(68, 92, 65);"> 
                   <h3 class="text-center m-t-10"> Sign In to <strong><?php echo BRANDING_COMPANY_NAME; ?></strong> </h3>
                </div> 

                <form id="loginForm" class="form-horizontal m-t-40" action="LoginController.php" method="post">
                    <div  class="form-group ">
                        
                        <strong><div style="color:rgba(192,0,3,1.00)" class="col-xs-12">
                            <label id="loginFail" >
                            </label>
                        </div></strong>
                    </div>
                    <div align="center" class="form-group">
                    	<img class="img-responsive" style="width:60%" src="img/Asset 17.png" />
                    </div>
			<br>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input name="l_email" class="form-control" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group ">
                        
                        <div class="col-xs-12">
                            <input name="l_password" class="form-control" type="password" placeholder="Password">
                        </div>
                    </div>

                    
                    <div class="form-group text-right">
                        <div class="col-xs-12">
                            <button style="background-color:rgb(68, 92, 65); border:rgb(68, 92, 65) solid 1px" class="btn btn-purple w-md" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30">
                        <div class="col-sm-5 text-right">
                            <a href="register.php">Request an account</a>
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
	$("#loginFail").hide();

    $('#loginForm').on('submit',(function(e) {
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
					window.location = "home.php"
					
				}else{
					$("#loginFail").fadeIn();
					$("#loginFail").text(data);
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

</html>
	