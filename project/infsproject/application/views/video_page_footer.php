<br>
<br><br>Enter your rating for the Video(1-5):<input type="number" name="rate" /><br>
<b>overall rate:</b>
<?php if(isset($results)){
	$sum=0;
	$num=0;
	foreach ($results as $result) {
		$rate=$result->rating;
		$sum=$sum+$rate;
		$num+=1;
	}
} if($num==0) {
	echo 0;}
	else {
		echo $sum/$num;
	}
?>
<br><br>write your comment:
<br>
<textarea name="content"></textarea><br><br>
<input type="submit" value="submit" /> <b>(rating and comment)</b><br><br>

<b>all the comments about video:</b><br>


<div id="myScroll">
<?php if(isset($results)&&($results)){
	foreach ($results as $result) {
		if ($result->content==null){

		}
		else{
			echo 'Username: '.$result->username.'<br>';
			echo $result->content.'<br><br>';
		}


	}
}
?>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
	var counter=0;
	$(window).scroll(function () {
		if ($(window).scrollTop() == $(document).height() - $(window).height() && counter < 2) {
			appendData();
		}
	});
	function appendData() {
		var html = '';
		for (i = 0; i < 20; i++) {
			html += '<p class="dynamic">Dynamic Data :  This is test data.</p>';
		}
		$('#myScroll').append(html);
		counter++;

		if(counter==2)
			$('#myScroll').append('<button id="uniqueButton" style="margin-left: 50%; background-color: powderblue;">end</button><br /><br />');
	}
</script>







<script>
	window.onbeforeunload = function () { //when leave page perform this function

		var scrollPos; //var - claim a variable

		if (typeof window.pageYOffset != 'undefined') {//typeof 数据类型(string,int,boolean,undefined,object)

			scrollPos = window.pageYOffset; //return 垂直位置

		}

		else if (typeof document.compatMode != 'undefined' &&

			document.compatMode != 'BackCompat') {

			scrollPos = document.documentElement.scrollTop; //不兼容则滚回顶部

		}

		else if (typeof document.body != 'undefined') { //document.body=html body undefined->并不存在的属性

			scrollPos = document.body.scrollTop;//滚回top

		}

		document.cookie = "scrollTop=" + scrollPos;

	}

	window.onload = function () {

		if (document.cookie.match(/scrollTop=([^;]+)(;|$)/) != null) { //

			var arr = document.cookie.match(/scrollTop=([^;]+)(;|$)/);

			document.documentElement.scrollTop = parseInt(arr[1]); // document.documentElement属性以一个元素对象返回一个文档的文档元素并且解析

			document.body.scrollTop = parseInt(arr[1]);

		}

	}
</script>



</form>


</body>
</html>
