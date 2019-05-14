<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>

			/* STYLE UNTUK SLIDESHOW */
			.mySlides {display:none}
			.w3-left, .w3-right, .w3-badge {cursor:pointer; color: black; font-size: 50px;}
			.w3-badge {height:13px;width:13px;padding:0;} 

			/* STYLE UNTUK PRODUCT CARDS */
			* {
			  	box-sizing: border-box;
			}
			/* Float four columns side by side */
			.column {
				float: left;
				width: 25%;
				padding: 0 10px;
			}

			/* Remove extra left and right margins, due to padding */
			.row {margin: 0 -5px;}

			/* Clear floats after the columns */
			.row:after {
			  	content: "";
			  	display: table;
			  	clear: both;
			}

			/* Responsive columns */
			@media screen and (max-width: 600px) {
			  	.column {
			    	width: 100%;
			    	display: block;
			    	margin-bottom: 20px;
			  	}
			}

			/* Style the counter cards */
			.card {
			  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  	padding: 16px;
			  	text-align: center;
			  	background-color: #f1f1f1;
			}

			

		</style>
	</head>

	<body>
		<!-- NAMPILIN SLIDESHOW IMAGE YANG BAKAL DIPAKAI SEBAGAI IKLAN-->
		<div id="myCarousel" class="carousel slide" data-ride="carousel" >
	  		<!-- Indicators -->
		  	<ol class="carousel-indicators">
		    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		   	 	<li data-target="#myCarousel" data-slide-to="1"></li>
		   	 	<li data-target="#myCarousel" data-slide-to="2"></li>
		   	 	<li data-target="#myCarousel" data-slide-to="3"></li>
		   	 	<li data-target="#myCarousel" data-slide-to="4"></li>
		  	</ol>

		  	<!-- Wrapper for slides -->
		  	<div class="carousel-inner">
		    	<div class="item active">
		     		<img src="<?php echo base_url('assets/images/slider/'); ?>asset_tokokita_pemweb_slider-0.png" alt="Daily" width="100%" height="auto">
		    	</div>

		    	<div class="item">
		      		<img src="<?php echo base_url('assets/images/slider/'); ?>asset_tokokita_pemweb_slider-1.png" alt="Foods" width="100%" height="auto">
		    	</div>

		    	<div class="item">
		      		<img src="<?php echo base_url('assets/images/slider/'); ?>asset_tokokita_pemweb_slider-2.png" alt="Toys" width="100%" height="auto">
		    	</div>

		    	<div class="item">
		      		<img src="<?php echo base_url('assets/images/slider/'); ?>asset_tokokita_pemweb_slider-3.png" alt="Stationary" width="100%" height="auto">
		    	</div>

		    	<div class="item">
		      		<img src="<?php echo base_url('assets/images/slider/'); ?>asset_tokokita_pemweb_slider-4.png" alt="Books" width="100%" height="auto">
		    	</div>
		  	</div>

		  	<!-- Left and right controls -->
		  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
		    	<span class="sr-only">Previous</span>
		  	</a>
		  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
		    	<span class="sr-only">Next</span>
		  	</a>
		</div>

			<!-- PRODUCT CARTS -->
		<div class="container" style="padding-bottom: 80px;padding-top: 30px;">
			<div class="row">
				<!-- HEADER & COLUMN SEARCH PRODUCT CART -->
				<p class="col-sm-4" style="font-size: 26px; font-family:sans-serif;">PRODUCT</a>

				<div class="col-sm-4" style="text-align: right;">
			    	<form action="<?php echo base_url('index.php/Home/filter_category'); ?>" method="post">
			    		<div class="form-group">
						  	<select class="form-control" name="category" onchange="this.form.submit()">
						  		<option selected disabled>-----Select Category-----</option>
						    	<option value="1">Makanan</option>
						    	<option value="2">Minuman</option>
						    	<option value="3">Mainan</option>
						    	<option value="4">Alat Tulis</option>
						    	<option value="5">Buku</option>
						    	<option value="6">Daily</option>
						  	</select>
						</div>
			    	</form>
			  	</div>
			  	<!-- UNTUK LIVE SEARCH -->
			  	<div class="col-sm-4 form-group" style="text-align: right;">
			  		<div class="input-group">
			  			<span class="input-group-addon">Search</span>
			  			<input class="form-control" type="text" name="search_product_name" id="search_product_name" placeholder="Search Product">
			  		</div>
			  	</div>
			</div>
			
			<hr>
			<div style="font-family: Arial, Helvetica, sans-serif;">
				<div class="row">
					<div id="product_result"></div>
				</div>
			</div>
			<!-- BAGIAN SEARCH PUNYA -->
			<script type="text/javascript">
				load_data();
				function load_data(query){
					$.ajax({
						<?php if(isset($_POST['category'])){ 
								$id = $_POST['category'];
						?>
							url: "<?php echo base_url('index.php/Home/fetch_filtered/').$id; ?>",
						<?php }else{?>
							url: "<?php echo base_url('index.php/Home/fetch'); ?>",
						<?php } ?>
						method: "POST",
						data: {query:query},
						success: function(data){
							$('#product_result').html(data);
						}
					})
				}
				$('#search_product_name').keyup(function(){
					var search = $(this).val();
					if(search != ''){
						load_data(search);
					}
					else{
						load_data();
					}
				})
			</script>
			<hr>
			<div style="font-family: Arial, Helvetica, sans-serif;">
				<!-- untitled -->
			</div>
		</div>

	</body>
</html>