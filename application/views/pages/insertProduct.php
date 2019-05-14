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
	  <h2>Add New Product</h2>
	  <?php
						if($this->session->flashdata('message')=="Product berhasil ditambahkan"){
							echo '
							<div class="alert alert-success">
								'.$this->session->flashdata("message").'
							</div>
							';
						}
						else if($this->session->flashdata('message')=="Kolom tidak boleh kosong!"){
							echo '
							<div class="alert alert-warning">
								'.$this->session->flashdata("message").'
							</div>
							';
						}
					?>
	  <form class="form-horizontal" action="<?php echo base_url('index.php/Home/validationNewProduct') ?>" method="POST">
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="name">Product Name:</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="name">Product Price:</label>
	      <div class="col-sm-10">
	        <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="price">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="name">Product Weight:</label>
	      <div class="col-sm-10">
	        <input type="number" class="form-control" id="weight" placeholder="Enter Product Weight" name="weight">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="name">Product Detail:</label>
	      <div class="col-sm-10">
	        <textarea type="text" class="form-control" id="detail" placeholder="Enter Product Detail" name="detail"></textarea>
	      </div>
	    </div>

	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" class="btn btn-default">Submit</button>
	      </div>
	    </div>
	  </form>
	</div>
	
	<?php echo $footer; ?>
</body>
</html>