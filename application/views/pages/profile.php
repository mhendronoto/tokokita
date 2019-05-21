<!DOCTYPE html>
<html>
<head>
	<?php 
		echo $js;
		echo $css;
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>tokokita</title>
</head>
<body>
	<?php echo $header; ?>
	<div class="container">
	  <h2>Profile</h2><hr>
	  <div class="row mx-1 my-1 text-center">
            <div class="col-sm-12">
                <img style="width:256px;height:256px;border-radius:50%;" src="../../assets/images/logo/asset_tokokita_pemweb_logo-0.png"/>
            </div>
      </div>
      <div class="row mx-1 my-1 text-center">
		  <?php
		  		foreach($profile as $p){
		  			echo '<h4>Nama  : '.$p['name'].'</h4>';
		  			echo '<h4>Email : '.$p['email'].'</h4>';
		  		}
		  ?>
		  <a href="#" class="btn btn-default active">Change Password</a>
	  </div>

	  <br>
	  
	  <!-- <form class="form-horizontal" action="/action_page.php">
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Email:</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Password:</label>
	      <div class="col-sm-10">          
	        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <div class="checkbox">
	          <label><input type="checkbox" name="remember"> Remember me</label>
	        </div>
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" class="btn btn-default">Submit</button>
	      </div>
	    </div>
	  </form> -->

	<hr>
	<?php echo $footer; ?>
</body>
</html>