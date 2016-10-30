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
if(isset($_POST['field1'])) {
    $data = $_POST['field1'];
    $data=str_replace('> ',">".PHP_EOL,$data);
    $ret = file_put_contents('mydata.cpp', $data, LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
       // echo "$ret bytes written to file";
    }
}
else {
   die('no post data to process');
}
exec('g++ mydata.cpp -o a.exe');
$a=exec('a.exe');
$ansq="SELECT answer from answers where aid=$aid";
$retval=mysqli_query($con,$ansq);
while($row=mysqli_fetch_assoc($retval))
    {echo "<br>Required ouput is:{$row['answer']}";
     $b=$row['answer'];
    }
echo "<br>Your output is: ".$a;
echo "<br>";

if($a==$b)
{
    echo "<br>"."Right answer";
}
else 
{
    echo "<br>"."Wrong answer";
}
?>
</body>
</html>