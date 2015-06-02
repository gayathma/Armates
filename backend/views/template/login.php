<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Armates">
        <meta name="keyword" content="Armates">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>backend_resources/img/favicon.html">

        <title>Armates</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>backend_resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend_resources/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>backend_resources/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>backend_resources/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend_resources/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">
            <form class="form-signin" id="login_form" name="login_form" method="POST">
                <h2 class="form-signin-heading">sign in now</h2>
                <div class="login-wrap">
                    <input id="txtusername" name="txtusername" type="text" class="form-control" placeholder="Username" autofocus>
                    <input id="txtpassword" name="txtpassword" type="password" class="form-control" placeholder="Password">
                    <label class="checkbox">
                        <!--<input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right">
                            <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                        </span>-->
                    </label>
                    <button onclick="login()" class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>                   

                </div>
            </form>


            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-success" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>backend_resources/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/js/jquery.validate.min.js"></script>



    </body>
</html>


<script type="text/javascript">

                        var base_url = "<?php echo base_url(); ?>";
                        var site_url = "<?php echo site_url(); ?>";

                        $(document).ready(function () {
                            $("#login_form").validate({
                                focusInvalid: false,
                                ignore: "",
                                rules: {
                                    txtusername: "required",
                                    txtpassword: "required"
                                }, submitHandler: function (form) {
                                }
                            });

                        });


                        function login() {
                            var login_username = $('#txtusername').val();
                            var login_password = $('#txtpassword').val();

                            if ($('#login_form').valid()) {

                                $.ajax({
                                    type: "POST",
                                    url: site_url + '/login/authenticate_user',
                                    data: "login_username=" + login_username + "&login_password=" + login_password,
                                    success: function (msg) {

                                        if (msg == 1) {
                                            setTimeout("location.href = site_url+'/login/load_login';", 100);
                                        } else {
                                            login_form.reset();
                                            alert("Invalid Login details...");
                                        }
                                    }
                                });
                            }
                        }

</script>