<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dhiraapropertymart Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php base_url()?>assets/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/login/css/main.css">
    <style>
        img.logo {
            width: 150px;
        }
        .container-login100 {
            background: -webkit-linear-gradient(right, #947054, #000000f0,#947054);
        }
img.logo {
    background-color: wheat;
    border-radius: 59px;
    padding: 7px;
}
    </style>
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" <!--style="background-image: url('<?php /*base_url()*/?>assets/loginbg.jpg');-->">
        <div class="wrap-login100">
              <?php $attributes = array('class' => 'login100-form validate-form');
              echo form_open('login/login', $attributes); ?>
					<span class="login100-form-logo">
						 <img class="logo" src="<?php echo base_url();?>assets/images/logo1.png">
					</span>

                  <!---------------------------->
            <div id="message">
                <?php if( $this->session->flashdata('item')){ ?>
                    <div class="alert alert-warning">
                        <?php echo $this->session->flashdata('item'); ?>
                    </div>
                <?php } ?>
            </div>

            <!---------------------------->
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button style="background-color: red;" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-30">
<!--                    <a class="txt1" href="#">
                        Forgot Password?
                    </a>-->
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php base_url()?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="<?php base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php base_url()?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php base_url()?>assets/login/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php base_url()?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php base_url()?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php base_url()?>assets/login/js/main.js"></script>

</body>
</html>