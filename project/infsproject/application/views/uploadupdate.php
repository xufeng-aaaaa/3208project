<html>
<head>
	<title> Upload video</title>
</head>
<body>

	<?php echo form_open_multipart('Maincontroller/uploadupdatef');?>
	Please upload your Video  (mp4,ogg，webm only)
	<br><br><br>
	<?php
if (isset($error)){
	echo $error;
} ?>
	<input type="file" name="userfile" size="20" multiple=""/><br><br>

	<br>
	<br>

	Video introdution: <input type="text" name="int" /><br><br>
	Video tag: <input type="text" name="tag" /><br><br>

	<br>
	<br>
	<input type="submit" value="upload"/>




</body>
</html>
