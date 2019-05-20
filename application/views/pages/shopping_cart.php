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
		if($this->session->userdata('level')==0){
			//admin
			echo '<div class="container" style="margin-top: 20px;">';
			foreach($daftar_user as $du){
				echo '<h1>'.$du['name'].'</h1>';
				echo '
				
					<table class="table table-stripped table-bordered" id="produk">
						<thead>
							<th>Product Name</th>
							<th>Quantity per Unit</th>
							<th> Tanggal Transaksi </th>
							<th>Price</th>
							<th>Actions</th>
							<!-- <th></th> -->
						</thead>
						<tbody>';
						foreach ($sc_product as $row) {
							if($row['id_user']==$du['id']){
								$id_product = $row["productid"];
								$product_name = $row["productname"];
								$qty_per_unit = $row["qty"];
								$price = $row["price"];
								$name = $row['username'];
								$date= $row['date'];

								echo "<tr>";
									echo "<td>" . $product_name . "</td>";
									echo "<td>" . $qty_per_unit . "</td>";
									echo "<td>" . $date . "</td>";
									echo "<td>" . $price . "</td>";
									echo "<td> <a>Sent</a> <a>Finish</a></td>";
									// echo "<td></td>";
								echo "</tr>";
								$totalprice += $price;
							}
						}
						echo '<tfoot>
								<td colspan="3">Total Price</td>
								<td colspan="1">'.$totalprice.'</td>
								<td colspan="1"></td>
							</tfoot>';
					?>
					</tbody>
				</table>
			<?php }
			?>				

		<?php } 
		else if($this->session->userdata('level')==1){
			//user
			echo '
			<div class="container" style="margin-top: 20px;">
				<table class="table table-stripped table-bordered" id="produk">
					<thead>
						<th>Product Name</th>
						<th>Quantity per Unit</th>
						<th> Tanggal Transaksi </th>
						
						<th>Price</th>
						<th>Actions</th>
						<!-- <th></th> -->
					</thead>
					<tbody>';?>
					<?php 

						foreach ($sc_product as $row) {
							if($row['id_user']==$this->session->userdata('id')){
								$id_product = $row["productid"];
								$product_name = $row["productname"];
								$qty_per_unit = $row["qty"];
								$price = $row["price"];
								$name = $row['username'];
								$date= $row['date'];

								echo "<tr>";
									echo "<td>" . $product_name . "</td>";
									echo "<td>" . $qty_per_unit . "</td>";
									echo "<td>" . $date . "</td>";
									
									echo "<td>Rp. " . $price . ", -</td>";
									// echo "<td></td>";
								echo "</tr>";
								$totalprice += $price;
							}
						}
						echo '<tfoot>
								<td colspan="3">Total Price</td>
								<td colspan="1">Rp. '.$totalprice.', -</td>
								<td colspan="1"></td>
							</tfoot>';
					?>
					</tbody>
				</table>
		
		<?php  }?>


	
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