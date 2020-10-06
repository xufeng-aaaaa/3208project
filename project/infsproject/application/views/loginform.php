

<?php $yzm = "";
for($i=0;$i<5;$i++)
{
	$a = rand(0,9);
	$yzm.= $a;
}?>
<?php echo form_open('Maincontroller/login/'.$yzm); ?>

<?php
$user = isset($_COOKIE['username']) ?$_COOKIE['username']:'';
$pw = isset($_COOKIE['password']) ?$_COOKIE['password']:'';
?>

<label for="username">username: </label>
<input type="text" name="username" value="<?php echo $user; ?>" /><br>

<label for="password">password: </label>
<input type="password" name="password" value="<?php echo $pw; ?>" /><br><br>

<label for="captcha"  name='captcha'>security code: </label>

<?php echo $yzm;?> <br>

<label for="entercode" name="enter code">please enter security code: </label>
<input tpye="text" name="entercode"/>


<br><br>

<label for="rem">remember me</label>
<input type="checkbox" name="rem" value= '1'><br>


<br><input type="submit" name="submit" value="log in"/>
<br><br><a href="<?php echo site_url('Maincontroller/signupform') ?>" > SignUp</a>
<br><a href="<?php echo site_url('Maincontroller/forget_password_form') ?>" > Forget Password</a>




</form>
