<!DOCTYPE html>

<?php  if (isset($_SESSION['user'])){
	if (time()-$_SESSION["login_time"]>90){
		unset($_SESSION['user']);
		echo 'Inactive status.Please log in again!';

		}


	else{
		$_SESSION["login_time"]=time();
	}
}
?><br>

<script src=<?php echo base_url().'js/jquery-3.5.0.min.js';?>> </script>



<script>
	$(document).ready(function(){

		$('#keyword').keyup(function() {

			var inputText= $(this).val();//get value from search box through GET method

			$.ajax({
					type: 'GET',
					url: "https://infs3202-81611db8.uqcloud.net/infsproject/index.php/Maincontroller/search_ajax",
					data: "keyword=" + inputText,//send data to server
					dataType: 'text',//return date type
					success: function (response) {
						var result="<ul>";
						document.getElementById('searchBox').innerHTML=response;
						$('#searchBox ul li').click(function () {
							var value=$(this).html();
							document.getElementById('keyword').value=value;
						});
						}

				});
		/*	var xmlhttp;
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('searchBox').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET', 'https://infs3202-81611db8.uqcloud.net/infsproject/index.php/Maincontroller/search_ajax?keyword=test', true);
			xmlhttp.send();*/

		});
	});


</script>

<?php
if (isset($_SESSION['user'])) {

echo form_open('Maincontroller/search');?>
<span>LOGO</span>
<a href="<?php echo site_url('Maincontroller') ?>" > HomePage</a>


<input type="text" id="keyword" name="keyword">


<input type="submit" name="sub" value="search">

<a href="<?php echo site_url('Maincontroller/logout') ?>" > logout</a>
<a href="<?php echo site_url('Maincontroller/display_user_info') ?>" > Profile</a>
<a href="<?php echo site_url('Maincontroller/filechoice') ?>" > upload</a>
<a href="<?php echo site_url('Maincontroller/location') ?>" > CurrentLocation</a>

<?php }  else {

echo form_open('Maincontroller/search');?>
<span>LOGO</span>
<a href="<?php echo site_url('Maincontroller') ?>" > HomePage</a>


<input type="text" id="keyword" name="keyword">


<input type="submit" name="sub" value="search">

<a href="<?php echo site_url('Maincontroller/loginform') ?>" >login </a>


<?php } ?>
<div id="searchBox" ></div>


<?php
echo "<br>";
//<!--JS refresh -->
echo ("<script type=\"text/javascript\">");
echo ("function fresh_page()");
echo ("{");
echo ("window.location.reload();");
echo ("}");
echo ("setTimeout('fresh_page()',92000);");
echo ("</script>");?>



