<html>
<body>
<?php
$con=mysqli_connect('localhost','root','','project')or die(mysql_error());
$qid=2;
$aid=2;
$ques="SELECT question from questions where qid=$qid";
$retval=mysqli_query($con,$ques);
while($row=mysqli_fetch_assoc($retval))
    echo "Question is:<br>{$row['question']}";
 ?>
<form action="check.php" method="POST">
 field1:<input name="field1" type="text" />
    <input type="submit" name="submit" value="Save Data">
</form>
</body>
</html>