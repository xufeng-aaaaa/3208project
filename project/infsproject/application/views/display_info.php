<html>

<h1>Check your profile</h1>
<br>
<?php if (isset($user)){?>
	Your current Phone number: <?php echo $user['phone']?> <br><br>
	Your current Email: <?php echo $user['email']?> <br><br>
	Your current Secret question: <?php echo $user['secret_ques']?><br><br>
	Your current Answer:<?php echo $user['answer']?><br><br>
	Your email Verification status: <?php if ($user['status']=='false'){
		echo 'Not verified yet';
	}
	else{
		echo 'Verified already';
	}

	$email=$user['email'];
	$username=$user['username'];
	?>


	<br><br><br>

	<a href="<?php echo site_url('Maincontroller/email/'.$email."/".$username) ?>" >Verify your Email</a>
	<br><br>
	<a href="<?php echo site_url('Maincontroller') ?>" >Go to HomePage</a>

<?php }  ?>


</html>
