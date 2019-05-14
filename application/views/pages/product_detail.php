<!DOCTYPE html>
<html>
<head>
	<title>Details of Product</title>
	<?php echo $js; echo $css; ?>
</head>
<body>
	<?php echo $header; ?>

	<!-- NAMPILIN PRODUCT DETAIL -->
	<div class="container" style="margin-bottom: 100px;">
		<div class="row">
			<h3 class="col-sm-3"><b><?php echo $selected_product[0]['product_name']; ?></b></h3>
			<div class="">
				<a class="btn btn-lg btn-danger" style="margin-top: 17px; float: right;" href="<?php echo base_url(); ?>">Back</a>
			</div>
		</div>
		
		<hr>
		<img src="<?php echo base_url().$selected_product[0]['product_path_image']; ?>" width="300px" height="auto" style="padding-bottom: 10px;">
		
		<div class="row">
			<h4 class="col-sm-3"><b>Price:</b></h4>
			<p class="col-sm-9" style="padding-top: 11px;">Rp. <?php echo $selected_product[0]['product_price']; ?></p>
		</div>
		<div class="row">
			<h4 class="col-sm-3"><b>Weight:</b></h4>
			<p class="col-sm-9" style="padding-top: 11px;"><?php echo $selected_product[0]['product_weight']; ?></p>
		</div>
		<div class="row">
			<h4 class="col-sm-3"><b>Stock:</b></h4>
			<p class="col-sm-9" style="padding-top: 11px;"><?php echo $selected_product[0]['product_stock']; ?></p>
		</div>
		<div class="row">
			<h4 class="col-sm-3"><b>Notes:</b></h4>
			<p class="col-sm-9" style="padding-top: 11px;"><?php echo $selected_product[0]['product_detail']; ?></p>
		</div>

		<hr>
		<div style="text-align: right;">
			<?php $id = $selected_product[0]['product_id']; ?>
			<a class="btn btn-warning" href="<?php echo base_url('index.php/Home/add_to_shopping_cart_detail/').$id; ?>">Add to Cart</a>
		</div>	
	</div>

	<?php echo $footer; ?>
</body>
</html>