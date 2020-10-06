<html>
<?php if (isset($username)){

} ?>
<?php echo form_open('Maincontroller/verify_email/'.$yzm.'/'.$username); ?>
<h1>Email verification </h1><br><br><br>
An Email just sent to you<br>
Please Enter Your Email verification code: <input type="text" name="verify"><br><br>
<input type="submit" name="submit" value="submit"/>

</html>
