<html>
<head>
	<title>Upload multiple Video</title>
</head>
<body>
<?php echo form_open_multipart('Maincontroller/uploadmultif');?>
Please upload your Video  (mp4,ogg,webm only)
<br><br><br>
<?php

if (isset($error)){
	echo $error;
}?>

<input type="file" name="userfiles[]"  multiple/><br><br>
<br>
<br>

Video introdution: <input type="text" name="int" /><br><br>
Video tag: <input type="text" name="tag" /><br><br>

<br>
<br>
<input type="submit" value="upload"/>
</body>
</html>
