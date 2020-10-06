<br><br><?php if(isset($results)){
	foreach ($results as $result){
		echo "<a href=".site_url('Maincontroller/video_detail/'.$result->vid).">".$result->introduction."</a><br>";
	}}?>
</body>
</html>
