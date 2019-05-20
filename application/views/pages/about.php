<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<?php 
		echo $js;
		echo $css;
	?>

	<style>
		.zoom{
		    transition: transform .2s; /* Animation */
		    margin: 0 auto;
		}
		.zoom:hover{
		    transform: scale(1.1);
		}

	</style>
</head>
<body>
	<?php echo $header; ?>

	<br><br>
	
	<div class="container-fluid">
        <div class="row mx-1 my-1 text-center">
            <div class="zoom col-sm-4">
                <img style="width:256px;height:256px;border-radius:50%;" src="../../assets/images/septiandy.jpg"/>
                <p><b>Septiandy - 00000014415<br>
            </div>
            <div class="zoom col-sm-4">
                <img style="width:256px;height:256px;border-radius:50%;" src="../../assets/images/indra.jpg"/>
                <p><b>Indra Gunawan - 00000013226<br>
            </div>
            <div class="zoom col-sm-4">
                <img style="width:256px;height:256px;border-radius:50%;" src="../../assets/images/melvin.jpg"/>
                <p><b>Melvin Hendronoto - 00000013229<br>
            </div>
        </div>
        <br>
        <div class="row mx-1 my-1 text-center">
            <div class="zoom col-sm-4">
                <img style="width:256px;height:256px;border-radius:50%;" src="../../assets/images/andrianus.jpg"/>
                <p><b>Andrianus - 00000017337<br>
            </div>
            <div class="zoom col-sm-4">
                <img style="width:256px;height:256px;border-radius:50%;" src="../../assets/images/jovan.jpg"/>
                <p><b>Jovan Sky - 00000010665<br>
            </div>
            <div class="zoom col-sm-4">
                <img style="width:256px;height:256px;border-radius:50%;" src="../../assets/images/priskila.jpg"/>
                <p><b>Priskila - 00000013689<br>
            </div>
        </div>
    </div>
	
	<?php echo $footer; ?>
</body>
</html>