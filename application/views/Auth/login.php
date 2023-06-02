<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <meta name="author" content="Denver web development">

        <title>Login | Online Library Management System</title>
        <link rel="shortcut icon" href="<?=base_url();?>assets/back-office/img/favicon.ico" type="image/x-icon">

        <link href="<?=base_url();?>assets/back-office/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/back-office/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/back-office/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/back-office/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/back-office/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/back-office/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/back-office/css/style.css" rel="stylesheet" type="text/css" />
        <script src="<?=base_url();?>assets/back-office/js/modernizr.min.js"></script>
    </head>
    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
                <div class="panel-heading">   
                    <a href="<?=base_url();?>">
                        <div class="login-logo">
                            <img src="<?=base_url();?>assets/front-office/img/core-img/logo.png" alt="CTU Consolacion">
                        </div>              
                    </a>
                    <h3 class="text-center"> Sign In to <strong class="text-danger">CTU-BMS</strong> </h3>
                </div> 
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="POST" action="<?=base_url()?>auth/login_user">
                        <?php if(isset($_SESSION['error_msg'])){ ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong><i class="fa fa-times"></i> Oops!</strong> <?=$_SESSION['error_msg'];?>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="username" type="text" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form> 
                </div>   
            </div>                              
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Forgot Password <a href="<?=base_url()?>" class="text-primary m-l-5"><b>Click Here</b></a></p>
                </div>
            </div>
        </div>
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?=base_url();?>assets/back-office/js/jquery.min.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/detect.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/fastclick.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/jquery.blockUI.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/waves.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/wow.min.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/jquery.scrollTo.min.js"></script>


        <script src="<?=base_url();?>assets/back-office/js/jquery.core.js"></script>
        <script src="<?=base_url();?>assets/back-office/js/jquery.app.js"></script>
	
	</body>
</html>