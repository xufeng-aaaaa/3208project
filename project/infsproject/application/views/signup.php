<html>

	<?php echo form_open('Maincontroller/signup');?>
	<h1>Welcome to sign-up page</h1><br>
	please enter your username:<input type="text" name="un">
	<br>
	please enter your password:<input type="text" name="pw">
	<br>
	please enter your phone number:<input type="text" name="phone">
	<br>
	please enter your email:<input type="text" name="email">
	<br>

	please enter your secret question:<input type="text" name="question">
	<br>
	please enter your Answer:<input type="text" name="answer">
	<br>
	i'm not a robot<input type="checkbox" name="check">
	<br>
	<input type="submit" name="signup" value="SignUp">
	<br>
	<script type="text/javascript">
		var onloadCallback = function() {
			alert("recaptcha is ready!");
		};
	</script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
			async defer>
	</script>

</form>
</html>
