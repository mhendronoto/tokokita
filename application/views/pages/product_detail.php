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
		</div>
		
		<div class="row">
			<hr>
			<div class="col-md-4">
				<img src="<?php echo base_url().$selected_product[0]['product_path_image']; ?>" width="300px" height="auto" style="padding-bottom: 10px;">
			</div>
			<div class="col-md-8">
				<br><br><br>
				<div class="row">
					<h4 class="col-sm-2"><b>Price</b></h4>
					<p class="col-sm-10" style="padding-top: 11px;"><b>:</b>&nbsp;&nbsp;Rp. <?php echo $selected_product[0]['product_price']; ?>, -</p>
				</div>
				<div class="row">
					<h4 class="col-sm-2"><b>Weight</b></h4>
					<p class="col-sm-10" style="padding-top: 11px;"><b>:</b>&nbsp;&nbsp;<?php echo $selected_product[0]['product_weight']; ?></p>
				</div>
				<div class="row">
					<h4 class="col-sm-2"><b>Stock</b></h4>
					<p class="col-sm-10" style="padding-top: 11px;"><b>:</b>&nbsp;&nbsp;<?php echo $selected_product[0]['product_stock']; ?></p>
				</div>
				<div class="row">
					<h4 class="col-sm-2"><b>Description</b></h4>
					<p class="col-sm-10" style="padding-top: 11px;"><b>:</b>&nbsp;&nbsp;<?php echo $selected_product[0]['product_detail']; ?></p>
				</div>
				<div class="row">
					<br>
					<div style="text-align: right;">
						<a class="btn btn-danger" href="<?php echo base_url(); ?>">Back</a>&nbsp;&nbsp;
						<?php $id = $selected_product[0]['product_id']; ?>
						<!-- <a class="btn btn-warning" data-toggle="modal" href="<?php echo base_url('index.php/Home/add_to_shopping_cart_detail/').$id; ?>">Add to Cart</a> -->
						<a class="btn btn-warning" data-toggle="modal" data-target="#myModal">Add to Cart</a>
					</div>	

				</div>
			</div>
		</div>
		<br><hr>
	</div>


			 <div style="text-align: center">
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Confirm</button>
			</div>
			<!-- Modal -- -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			   <!-- Modal content- -->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Quantity :</h4>
			      </div>

			      <div class="modal-body">
			        <form action="" method="post">
			        	<div class="form-group">
							<div class="input-group col-sm-4" >
						          <span class="input-group-btn">
						              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="qty">
						                <span class="glyphicon glyphicon-minus"></span>
						              </button>
						          </span>
						          <input type="text" name="qty" class="form-control input-number" value="1" min="1" max="100">
						          <span class="input-group-btn">
						              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="qty">
						                  <span class="glyphicon glyphicon-plus"></span>
						              </button>
						          </span>
						    </div>
			        	</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>


	<?php echo $footer; ?>
</body>
</html>
<script type="text/javascript">
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});

</script>