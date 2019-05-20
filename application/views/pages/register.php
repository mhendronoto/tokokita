<!DOCTYPE html>
<html>
<head>
	<?php 
		echo $js;
		echo $css;
	?>
	<title>Complete User Registration and Login System in Codeigniter</title>
</head>
<body>
	<div class="page-wrapper bg-red p-t-100 p-b-100 font-robo">
		<div class="wrapper wrapper--w960">
			<div class="card card-2">
				<div class="card-heading"></div>
				<div class="card-body">
					<h2 class="title">Registration</h2>
					<?php
						if($this->session->flashdata('message')){
							echo '
							<div class="alert alert-success">
								'.$this->session->flashdata("message").'
							</div>
							';
						}
					?>

					<form method="post" action="<?php echo base_url(); ?>index.php/register/validation">
						<div class="input-group">
							<input class="input--style-2" placeholder="Name" type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>" />
							<p></p>
						</div>
						<span style="color:red"><?php echo form_error('user_name'); ?><br></span>
						<div class="input-group">
							<input class="input--style-2" placeholder="Email" type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
							
						</div>
						<span style="color:red"><?php echo form_error('user_email'); ?><br></span>
						<div class="input-group">
							<input class="input--style-2" placeholder="Password" type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
							
						</div>
						<span style="color:red"><?php echo form_error('user_password'); ?><br></span>
						<div class="input-group">
							<input class="input--style-2" placeholder="Confirm Password" type="password" name="conf_user_password" class="form-control" value="<?php echo set_value('conf_user_password'); ?>" />
							
						</div>
						<span style="color:red"><?php 
							// echo(form_error('conf_user_password'));
							if(form_error('conf_user_password')=="The Confirmation Password field is required."){
								echo(form_error('conf_user_password'));
							}
							elseif(form_error('conf_user_password')=="The Confirmation Password field does not match the Password field."){
								// echo "Password tersebut tidak cocok. Coba lagi."; 
								echo(form_error('conf_user_password'));
							}

						?><br></span>

						<div class="input-group">
							<textarea class="form-control input--style-2" placeholder="Enter Address" row='3' cols='55'  name="alamat" value="<?php echo set_value('alamat'); ?>"></textarea>
							
						</div>
						<span style="color:red"><?php echo form_error('alamat'); ?><br></span>

						<div class="input-group">
							<input type="submit" name="register" value="Register" class="btn btn--radius btn--green" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>index.php/login"></a>
							<!-- <input type="submit" name="login" value="Login" class="btn btn--radius btn--green" />--><br>
							<div style="text-align: center">
							Already have an account?
							<a href="<?php echo base_url("index.php/login"); ?>">Login</a>			</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
