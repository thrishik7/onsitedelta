<?php
session_start();
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHRSTUVWXYZ';
$randstring = '';
for ($i = 0; $i < 7; $i++) {
    $randstring.= $characters[rand(0, strlen($characters))];
}

$output= "images/".time().".jpg";

$x=rand(150,250);
$y=rand(60,80);

$image=imagecreate($x,$y);
$black= imagecolorallocate($image,255,190,190);
$black= imagecolorallocate($image,0,0,0);
$font = "fonts/TCCEB.TTF";
$text1=imagettftext($image,20, 0,$x-120,$y-30,$black,$font,$randstring);
imagejpeg($image,$output);

$db= mysqli_connect('localhost','root','', 'onsite')or die("could not connect database..");
$sql="INSERT INTO ` captcha` ('code', 'images') VALUES ('$randstring','$output')";
mysqli_query($db,$sql);


$_SESSION['string']=$randstring;
$_SESSION['image']=$output;
?>

<img style="margin:10px;" src="<?php echo $output; ?>">
<div class="row" style="margin:10px;">
<input type="text" id="answer" style="width:100%;">
</div>
 <button class="btn btn-primary" type="button" onclick="check();">Check</button>
     
