<?php 
session_start();
$user= $_POST['name'];
$string=$_SESSION['string'];
$output=$_SESSION['image'];
$answer=$_POST['answer'];

if($string==$answer){


$db= mysqli_connect('localhost','root','', 'onsite')or die("could not connect database..");
$sql="INSERT INTO ` notrobot` ('user','code', 'images') VALUES ('$user','$string','$output');";
mysqli_query($db,$sql);

?>

<div style="margin:10px;">
<p style="color:white">CORRECT</p>
</div>

<div style="margin:10px;">
<p style="color:white">WELCOME <?php echo $user ?></p>
</div>








<?php

  } else {

?>
<div style="margin:10px;">
<p style="color:white">TRY AGAIN</p>
</div>

  <?php } ?>
