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
		  <a data-toggle="modal" data-target="#myModalPass" class="btn btn-default active">Change Password</a>
		  <a data-toggle="modal" data-target="#myModalAddress" class="btn btn-default active">Change Address</a>
	  </div>

	  <br>
	  

	<hr>
	<?php echo $footer; ?>

<!-- Modal -- -->
			<div id="myModalPass" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">

			   <!-- Modal content- -->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Setting </h4>
			      </div>

			      <div class="modal-body">
			        <form action="<?php echo site_url('home/updateProfilePass/').$this->session->userdata('id') ?>" method="post" id="form_pass">
			        	<div class="form-group">
					      <label class="control-label" for="name">Change Password :</label>
					      <div class="">
					        <input type="text" class="form-control" id="new_pass" placeholder="Enter New Password" name="new_pass">
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label" for="name">Confirm Password :</label>
					      <div class="">
					        <input type="text" class="form-control" id="conf_new_pass" placeholder="Confirm New Password" name="conf_new_pass">
					      </div>
					    </div>
			        </form>
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-default" form="form_pass">Confirm</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

			<!-- Modal -- -->
			<div id="myModalAddress" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">

			   <!-- Modal content- -->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Setting </h4>
			      </div>

			      <div class="modal-body">
			        <form action="<?php echo site_url('home/updateProfileAddress/').$this->session->userdata('id') ?>" method="post" id="form_address">

					    <div class="form-group">
					      <label class="control-label" for="name">Change Address :</label>
					      <div class="">
					        <input type="text" class="form-control" id="new_address" placeholder="Enter New Address" name="new_address">
					      </div>
					    </div>
			        </form>
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-default" form="form_address">Confirm</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

</body>
</html>