<div class="container-fluid">
	<div style="text-align: right"> <!-- Font Size (?) / Icon -->
		<!-- <a href="#"><i style="margin-right: 10px"></i><span>Konfirmasi Pembayaran</span></a>
		<a href="#"><i style="margin-right: 10px"></i><span>Login</span></a>
		<a href="#"><i style="margin-right: 10px"></i><span>Daftar</span></a> -->
	</div>
</div>
<!-- NAVBAR MENUTITLE -->
<div style="margin:0;font-family:Arial;">
	
	<!-- <div class="topnav" id="myTopnav"> -->
		<!-- <h4><img src="<?php echo base_url('assets/images/logo/'); ?>asset_tokokita_pemweb_logo-1.png" width="auto" height="40px"></h4> -->
	  	<!-- <h4><b>tokokita</b></h4> -->
	  	<?php  
	  		// if($this->session->userdata('id')==''){
	  		// 	echo "<a href='".base_url('index.php/Login')."'>Login</a>";
	  		// }
	  		// else{
	  		// 	echo "<a href='".base_url('index.php/Home/userLogout')."'>Logout</a>";
	  		// }
	  	?>
	  	
	  	<!-- <a href="<?php echo base_url('index.php/Home/openAbout'); ?>">About</a> -->
	  	
	  	<?php  
	  	// if($this->session->userdata('level')==0){
	  	// 	echo "<a href='".base_url('index.php/Home/openShoppingCart')."'>Admin Shopping Cart <!-- <span class='badge' style='background-color: red; margin-bottom: 5px;''>1</span> --></a>";
	  	// }
	  	// else if($this->session->userdata('level')==1){
	  	// 	echo "<a href='".base_url('index.php/Home/openShoppingCart')."'>User Shopping Cart <!-- <span class='badge' style='background-color: red; margin-bottom: 5px;''>1</span> --></a>";
	  	// }
	  	?>

	  	<!-- <a href="<?php echo base_url(); ?>" class="">Home</a> -->
	  	
	  	
	  	<!-- Menu Icon kalau versi mobile -->
	  	<!-- <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a> -->
	<!-- </div> -->

	  	<div class="navbar navbar-inverse" style="margin:0;border-radius:0px;background-color: #333333;">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <h4><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/logo/'); ?>asset_tokokita_pemweb_logo-1.png" width="auto" height="40px"></a></h4>
		    </div>
		    <ul class="nav navbar-nav navbar-right""> 
		    	<li><a href="<?php echo base_url(); ?>" class="">Home</a></li>
		    	<?php  
				  	if($this->session->userdata('level')==0){
				  		echo "<li><a href='".base_url('index.php/Home/openShoppingCart')."'>Admin Shopping Cart <!-- <span class='badge' style='background-color: red; margin-bottom: 5px;''>1</span> --></a></li>";
						echo "<li ><a style='color:white;' class='btn btn-success' href='".base_url("index.php/Home/addNewProduct")."'>Add Product</a></li>";
				  		echo "<li ><a style='color:white;' class='btn btn-success' href='".base_url("index.php/Home/manageOrders")."'>Manage Order</a></li>";
					
					}
				  	else if($this->session->userdata('level')==1){
						  echo "<li><a href='".base_url('index.php/Home/openShoppingCart')."'>User Shopping Cart <!-- <span class='badge' style='background-color: red; margin-bottom: 5px;''>1</span> --></a></li>";
						  echo "<li><a href='".base_url('index.php/Home/orderHistory')."'>User Order History</a></li>";
					}
			  	?>
		    	<li><a href="<?php echo base_url('index.php/Home/openAbout'); ?>">About</a></li>
		      	<?php  
			  		if($this->session->userdata('id')==''){
			  			echo "<li><a href='".base_url('index.php/Login')."'>Login</a></li>";
			  		}
			  		else{
			  			echo '
						  <li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello, '.$this->session->userdata("nama").'
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu" style="z-index:10;" >
					          <li><a href="'.base_url("index.php/Home/openProfile").'" >My Profile</a></li>
					          <li><a href="'.base_url('index.php/Home/userLogout').'"">Logout</a></li>
					        </ul>
					      </li>';
			  			// echo "<li><a href='".base_url('index.php/Home/userLogout')."'>Logout</a></li>";
			  		}
			  	?>
			  	
			  <!-- <li><a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a></li> -->
		       
		    </ul>
		  </div>
		</nav>
	<script>
		function myFunction() {
	  		var x = document.getElementById("myTopnav");
	  		if (x.className === "topnav") {
	    		x.className += " responsive";
	  		} else {
	    		x.className = "topnav";
	  		}
		}
	</script>
</div>

<style type="text/css">
	/* STYLE UNTUK NAVBAR MENU TITLE */
	.topnav {
		overflow: hidden;
		background-color: #333;
	}
	.topnav h4{
		float: left;
		color: white;
		padding-top: 4px;
		padding-left: 10px;
	}
	.topnav a {
		float: right;
		display: block;
		color: #f2f2f2;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
	}

	.active {
		background-color: maroon;
		color: white;
	}

	.topnav .icon {
		display: none;
	}

	.topnav a:hover, .category:hover .dropbtn {
	  	background-color: #555;
	  	color: white;
	}

	@media screen and (max-width: 600px) {
	  	.topnav a:not(:first-child), .category .dropbtn {
	    	display: none;
	  	}
	  	.topnav a.icon {
	    	float: right;
	    	display: block;
	  	}
	}

	@media screen and (max-width: 600px) {
	  	.topnav.responsive {position: relative;}
	  	.topnav.responsive .icon {
	    	position: absolute;
	    	right: 0;
	    	top: 0;
	  	}
	  	.topnav.responsive a {
	    	float: none;
	    	display: block;
	    	text-align: right;
	  	}
	  	.topnav.responsive .category {float: none;}
	  	1
	  	.topnav.responsive .category-content {position: relative;}
	  	.topnav.responsive .category .dropbtn {
	    	display: block;
	    	width: 100%;
	    	text-align: left;
	  	}
	}
</style>
