<html>
<?php
if (isset($row)){

	}?>
<?php echo form_open('Maincontroller/check_answer/'.$row['answer']."/".$row['username']); ?>
Your question is: <?php
	echo $row['secret_ques'];

?><br>

Please enter your answer for your question: <input type="text" name="ans"><br>
please enter your new password： <input type="password" name="password"/> <br />


<br><br>
<input type="submit" name="sub" value="submit">
</html>
</form>
