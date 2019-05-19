<!DOCTYPE html>
<html>
<head>
	<title>Order Details</title>
	<?php 
		echo $js;
		echo $css;
	?>
</head>
<body>
	<?php echo $header; ?>
	
   <div class="container" style="margin-top: 35px;">
		<?php echo form_open(); ?>
			<div class="form-group">
				<label class="control-label col-sm-2">Order ID</label>
				<div class="col-sm-10">
					<input disabled required type="text" class="form-control" value="<?php echo $order->order_id ?>"><br>
				</div>
			</div>
         <div class="form-group">
				<label class="control-label col-sm-2">Tracking Number</label>
				<div class="col-sm-10">
					<input disabled required type="text" class="form-control" value="<?php echo $order->tracking_number ?>"><br>
				</div>
			</div>
         <div class="form-group">
				<label class="control-label col-sm-2">Status</label>
				<div class="col-sm-10">
					<input disabled required type="text" class="form-control" value="<?php echo $order->description ?>"><br>
				</div>
			</div>
         <div class="form-group">
				<label class="control-label col-sm-2">Order Date</label>
				<div class="col-sm-10">
					<input disabled required type="text" class="form-control" value="<?php echo $order->order_date ?>"><br>
				</div>
			</div>
      <?php echo form_close(); ?>
      <table class="table table-stripped table-bordered" id="produk">
			<thead>
				<th>Product Name</th>
				<th>Quantity per Unit</th>
				<th>Sum Price</th>
				<!-- <th></th> -->
			</thead>
			<tbody>
			<?php 
				foreach ($order_details as $row) {
					$product_name = $row['product_name'];
					$qty_per_unit = $row['quantity_shopping'];
					$price = $row['sum_price'];

					echo "<tr>";
						echo "<td>" . $product_name . "</td>";
						echo "<td>" . $qty_per_unit . "</td>";
						echo "<td>" . $price . "</td>";
						// echo "<td></td>";
					echo "</tr>";
				}
			?>
			</tbody>
		</table>
		<script type="text/javascript">
			$('#produk').DataTable();
		</script>
      
	</div>
	<?php echo $footer; ?>
</body>
</html>