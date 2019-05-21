<!DOCTYPE html>
<html>
<head>

	<title>Shopping Cart</title>
	<?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
	<?php 
		// echo $js;
		// echo $css;
	?>
</head>
<body>
		<?php //echo $header; ?>

		<?php echo $output; ?>

		<?php //echo $footer; ?>
</body>
</html>