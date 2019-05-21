<!DOCTYPE html>
<html>
<head>

	<title>Shopping Cart</title>
	<?php 
		echo $js;
		echo $css;
	?>
</head>
<body>
	<?php echo $header; $totalprice = 0; $sc = array();?>
	

	<?php  
			//user
			echo '
			<div class="container" style="margin-top: 20px;">
				<table class="table table-stripped table-bordered" id="produk">
					<thead>
						<th>Product Name</th>
						<th>Quantity per Unit</th>						
						<th>Price</th>
						<th>Actions</th>
						<!-- <th></th> -->
					</thead>
					<tbody>';?>
					<?php 

						foreach ($sc_product as $row) {
							$shopping_cart_id = $row["shopping_cart_id"];
							$product_id = $row['product_id'];
							$product_name = $row["product_name"];
							$qty_per_unit = $row["quantity_shopping"];
							$price = $row["product_price"];

							echo "<tr>";
								echo "<td><a href='".base_url('index.php/Home/open_detail/').$product_id."'>". $product_name . "</a></td>";
								echo "<td>" . $qty_per_unit . "</td>";
								echo "<td>" . $qty_per_unit*$price . "</td>";
								echo "<td>";
								echo "<a href='delete_shopping_cart/".urlencode(base64_encode($shopping_cart_id))."'
									style='margin-right:10px;color:rgb(255,50,150);'>";
									echo "<button class='btn'>";
									echo "<span class='glyphicon glyphicon-remove'></span>";
									echo "</button>";
								echo "</a>";
							echo "</td>";
								// echo "<td></td>";
							echo "</tr>";
							$totalprice += $price*$qty_per_unit;
						}
						echo '<tfoot>
								<td colspan="3">Total Price</td>
								<td colspan="1">Rp. '.$totalprice.', -</td>
							</tfoot>';
					?>
					</tbody>
				</table>
		


	
		<script type="text/javascript">
			// $('#produk').DataTable();
			$('table.table').DataTable();
		</script>

		<!-- <div>
			<input type="text" name="" placeholder="Input Voucher">
			<button>Check</button>
		</div> -->

		<!-- <div style="text-align: center">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Confirm</button>
		</div>
		Modal --
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    Modal content-
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Payment</h4>
		      </div>
		      <div class="modal-body">
		        <p>Your total Price is : <?php // $totalprice; ?></p>
		        <p>Please Input Bayaran : </p>
		        <form action="" method="post">
		        	<div class="form-group">
		        		<input type="hidden" name="totalprice">
		        		<input class="form-control" type="number" name="bayaran">
		        	</div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
	</div> -->


	
	<?php echo $footer; ?>
</body>
</html>