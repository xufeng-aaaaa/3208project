<html>
<?php
echo form_open('Maincontroller/edituserfile/'.$username);?>
<h1>Edit your personal user profile</h1>
<br>

Enter your new new phone number: <input type="text" name="phone"  ><br><br>
Enter your new email: <input type="text" name="email"> <br><br>
Enter your new secret question: <input type="text" name="question"><br><br>
Enter your new Answer: <input type="text" name="answer"><br><br>
<input type="submit" name="submit" value="Submit">
</html>
