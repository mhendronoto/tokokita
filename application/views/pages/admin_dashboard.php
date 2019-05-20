<!DOCTYPE html>
<html>
<head>
	<title>Order Details</title>
	<?php 
		echo $js;
		echo $css;
	?>
   <style type="text/css">
   .btn-huge{
      padding-top:20px;
      padding-bottom:20px;
   }
   </style>
</head>
<body>
	<?php echo $header; ?>
	
   <div class="container" style="margin-top: 35px;">
      <div class="row">
         <div class="col-md-3">
               <a href="<?php echo base_url("index.php/Home/addNewProduct"); ?>" class="btn btn-success btn-lg btn-block btn-huge">Add Product</a>
         </div>
         <div class="col-md-3">
               <a href="<?php echo base_url("index.php/Home/manageOrders"); ?>" class="btn btn-success btn-lg btn-block btn-huge">Manage Order</a>
         </div>
         <!-- <div class="col-md-3">
               <a href="#" class="btn btn-success btn-lg btn-block btn-huge">Test button</a>
         </div>
         <div class="col-md-3">
               <a href="#" class="btn btn-success btn-lg btn-block btn-huge">Test button</a>
         </div> -->
      </div>
      <hr>
      <br>
	</div>
	<?php echo $footer; ?>
</body>
</html>