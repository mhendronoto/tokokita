<!DOCTYPE html>
<html>
<head>
	<title>Manage Orders</title>
	<?php 
		echo $js;
		echo $css;
	?>
</head>
<body>
	<?php echo $header;?>
	<div class="container" style="padding:32pt 0 0 0">         
		<table class="table table-stripped table-bordered" id="produk">
			<thead>
				<tr>
				<th>Order ID</th>
				<th>Tracking Number</th>
				<th>Status</th>
				<th>Date Ordered</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				//TODO: KALAU SHOPPING CART SELESAI PAYMENT ADD KE DB TABEL ORDER
				foreach ($orders as $row) {
					$order_id = $row['order_id'];
					$tracking_number = $row['tracking_number'];
					$status = $row['description'];
					$order_date = $row['order_date'];
					echo "<tr>";
						echo "<td>" . $order_id. "</td>";
						echo "<td>" . $tracking_number . "</td>";
						echo "<td>" . $status . "</td>";
						echo "<td>" . $order_date . "</td>";
						echo "<td>";
							echo "<a href='orderDetails/".urlencode(base64_encode($order_id))."'
									style='margin-right:10px;color:rgb(0,200,255);'>";
								echo "<button class='btn'>";
									echo "<span class='glyphicon glyphicon-search'></span>";
								echo "</button>";
							echo "</a>";
							echo "<a href='editOrder/".urlencode(base64_encode($order_id))."'
								style='margin-right:10px;color:rgb(255,215,0);'>";
								echo "<button class='btn'>";
								echo "<span class='glyphicon glyphicon-edit'></span>";
								echo "</button>";
							echo "</a>";
						echo "</td>";
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