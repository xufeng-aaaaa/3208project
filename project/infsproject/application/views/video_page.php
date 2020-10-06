

<?php if (isset($results)){
	echo form_open('Maincontroller/comment/'.$results['vid']);
} ?>
<br>
<video controls="controls" width="500px" height="300px" >

	<source src=<?php if (isset($results)) {
		echo $results['src'];
	}

	?>
			type="video/mp4">
</video>
<br>
<a href="<?php echo site_url('Maincontroller/dlfile/'.$results['name']) ?>" > Download Video</a>










