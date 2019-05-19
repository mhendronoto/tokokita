<!DOCTYPE html>
<html>
<head>
	<title>Edit Order</title>
	<?php 
		echo $js;
		echo $css;
	?>
</head>
<body>
	<?php echo $header; ?>
	
   <div class="container" style="margin-top: 35px;">
		<?php echo form_open("Home/edit_action"); ?>
			<div class="form-group">
				<label class="control-label col-sm-2">Order ID</label>
				<div class="col-sm-10">
					<input readonly required type="text" class="form-control" name="order_id" value="<?php echo $order->order_id ?>"><br>
				</div>
			</div>
         <div class="form-group">
				<label class="control-label col-sm-2">Tracking Number</label>
				<div class="col-sm-10">
					<input required type="text" class="form-control" name="tracking_number" value="<?php echo $order->tracking_number ?>"><br>
				</div>
			</div>
         <div class="form-group">
				<label class="control-label col-sm-2">Status</label>
				<div class="col-sm-10">
               <select class="form-control" name="order_status">
                  <option value="1">(Pick an option...)</option>
                  <option value="1">Pending</option>
                  <option value="2">Processing</option>
                  <option value="3">Shipping</option>
                  <option value="4">Completed</option>
               </select><br>
				</div>
			</div>
         <div class="form-group">
				<label class="control-label col-sm-2">Order Date</label>
				<div class="col-sm-10">
					<input readonly required type="text" class="form-control" value="<?php echo $order->order_date ?>"><br>
				</div>
			</div>
         <div class="form-group">
				<label class="control-label col-sm-2"></label>
				<div class="col-sm-10">
               <button type="submit" name="submit" class="btn btn-info">Submit</button><br><br>
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