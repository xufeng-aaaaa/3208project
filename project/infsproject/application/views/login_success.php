
<h1>Welcome <?php if(isset($username)) {
		echo $username;
	} ?> </h1>

<br>

<a href="<?php echo site_url('Maincontroller/edituserfileform/'.$username); ?>" >Edit your profile</a> <BR>
<a href="<?php echo site_url('Maincontroller/'); ?>" >Go to Homepage</a><br><br>


