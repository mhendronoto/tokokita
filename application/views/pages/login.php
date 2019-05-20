<!DOCTYPE html>
<html>
<head>
    <title>Login - Akun tokokita</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <?php 
        echo $js;
        echo $css;
    ?>
</head>

<body>
    <div class="page-wrapper bg-red p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <a class="card-heading" href="<?php echo site_url(); ?>"></a>
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    <?php
                    if($this->session->flashdata('message'))
                        {
                            echo '
                            <div style="color:red;">
                                '.$this->session->flashdata("message").'
                            </div>
                            ';
                        }
                    ?>
                    <form method="post" action="<?php echo base_url(); ?>index.php/login/validation">
                    <div class="form-group">
                        <div class="input-group">
                            <!-- <label>Enter Email Address</label> -->
                            <input type="text" name="user_email" placeholder="Enter Email Address" class="input--style-2" value="<?php echo set_value('user_email'); ?>" />
                            
                        </div>
                        <span style="color:red"><?php echo form_error('user_email'); ?><br></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <!-- <label>Enter Password</label> -->
                            <input type="password" name="user_password" placeholder="Enter Password" class="input--style-2" value="<?php echo set_value('user_password'); ?>" />
                        </div>
                        <span style="color:red"><?php echo form_error('user_password'); ?><br></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-info btn--green" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <!-- <a href="<?php echo base_url(); ?>index.php/register">Register</a> -->
                        <div style="text-align: center">
                            Don't Have an Account?
                            <a href="<?php echo base_url("index.php/register"); ?>">Register Now</a>          
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
