
<!DOCTYPE html>
<html>
<head>

	<link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>

	<style>
		.content{
			width: 50%;
			padding: 5px;
			margin: 0 auto;
		}
		.content span{
			width: 250px;
		}
		.dz-message{
			text-align: -moz-left;
			font-size: 28px;
		}
	</style>
	<script>
		// Add restrictions
		Dropzone.options.fileupload = {

			maxFilesize: 20 // MB
		};
	</script>
</head>
<body>

<div class='content'>
	<!-- Dropzone -->

	<form action="<?= base_url('index.php/Maincontroller/fileupload') ?>" class="dropzone" id="fileupload">
	</form>


</div>

<br><br><br>


<br>
<a href="<?php echo site_url('Maincontroller') ?>" >Back to Homepage</a>

</body>
</html>
