<html>
<body>
<?php  if (isset($_SESSION['user'])){
	if (time()-$_SESSION["login_time"]>90){
		unset($_SESSION['user']);
		echo 'Inactive status.Please log in again!';
	}
	else{
		$_session["login_time"]=time();

	}
}
?>
<br>
<?php
if (isset($_SESSION['user'])) { ?>
	<span>LOGO</span>
	<a href="<?php echo site_url('Maincontroller') ?>" > HomePage</a>

	<a href="<?php echo site_url('Maincontroller/logout') ?>" > logout</a>
	<a href="<?php echo site_url('Maincontroller/display_user_info') ?>" > Profile</a>
	<a href="<?php echo site_url('Maincontroller/location') ?>" > CurrentLocation</a>


<?php }  else { ?>
<span>LOGO</span>
<a href="<?php echo site_url('Maincontroller') ?>" > HomePage</a>

<a href="<?php echo site_url('Maincontroller/loginform') ?>" >login </a>


<?php } ?>



<?php
echo "<br>";
//<!--JS REFRESH PAGE -->
echo ("<script type=\"text/javascript\">");
echo ("function fresh_page()");
echo ("{");
echo ("window.location.reload();");
echo ("}");
echo ("setTimeout('fresh_page()',92000);");
echo ("</script>");?>


