<?php session_start(); ?>

<?php include "login.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>i-Sport Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-image: url(img/bgt.jpg); background-size: cover;">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <!-- <br /><br /> -->
                <!-- <h2> I-Sport : Login</h2> -->
               <br>
                <h4>Silahkan Lakukan login Admin</h4>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong> Login Admin </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="login.php" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="user" placeholder="Masukan Email Admin " required />
                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="pass" placeholder="Masukan Password Admin" required />
                                        </div>
                                    <div class="form-group">
                                            <!-- <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label> -->
                                            <span class="pull-right">
                                                   <!-- <a href="#" >lupa password ? </a>  -->
                                            </span>
                                        </div>
                                     
                                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                                    <hr />
                                   <!-- <a href="register.php" >Register </a>  -->
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
