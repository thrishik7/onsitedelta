<?php 
session_start();
 
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxzABCDEFGHJKLMNPQRSTUVWXYZ';
  
function generate_string($input, $strength = 10) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
$image = imagecreatetruecolor(200, 50);
 
imageantialias($image, true);
 
$colors = [];
 
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);
 
for($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
 
imagefill($image, 0, 0, $colors[0]);
 
for($i = 0; $i < 10; $i++) {
  imagesetthickness($image, rand(2, 10));
  $line_color = $colors[rand(1, 4)];
  imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $line_color);
}
 
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
$output= "images/".time().".png";

$fonts = ['fonts/Acme-Regular.ttf','fonts/Ubuntu-MI.ttf', 'fonts/Merriweather-BoldItalic.otf', 'fonts/TCCEB.TTF'];
 
$string_length = 6;
$captcha_string = generate_string($permitted_chars, $string_length);
 
$_SESSION['captcha_text'] = $captcha_string;
 
for($i = 0; $i < $string_length; $i++) {
  $letter_space = 170/$string_length;
  $initial = 15;
   
  imagettftext($image, 24, rand(-15, 15), $initial + $i*$letter_space, rand(25, 45), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $captcha_string[$i]);
}
 
header('Content-type: image/png');
imagepng($image,$output);

$db= mysqli_connect('localhost','root','', 'onsite')or die("could not connect database..");
$sql="INSERT INTO ` captcha` ('code', 'images') VALUES ('$captcha_string','$output')";
mysqli_query($db,$sql);
$_SESSION['string']=$captcha_string;
$_SESSION['image']=$output;

?>


<img style="margin:10px;" src="<?php echo $output; ?>">
<div class="row" style="margin:10px;">
<input type="text" id="answer" style="width:100%;">
</div>
 <button class="btn btn-primary" type="button" onclick="check();">Check</button>
     


