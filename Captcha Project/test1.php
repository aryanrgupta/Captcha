<?php
 
  session_start();

?>
<?php

// A header for the image to be specified before creating any image 
header("Content-Type: image/png");
// Craete abn image of particular dimensions
$im = @imagecreate(200, 190)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 12, 10, 10); // imagecolorallocate — Allocate a color for an background-image
$text_color = imagecolorallocate($im, 255, 10, 70);     // imagecolorallocate — Allocate a color for an textcolor

$alpha = array('');   // Creates an array

$i = '';
$j = 25;
$k = 0 ;
$index = 0;
$letter = '';
$space = "    ";
$char = '';
// position the char at specify x-coordinate position
$x = 5;  
// position the char at specify y-coordinate position
$y = 5;
// Counter to count the number of character dispalyed on that particular line
$count = 0;

// combine array to keep track of letter and their asssociated position
   $separate = array(array($letter, $x , $y));
   
   

for($i =65; $i<=70; $i++) {

//$char = chr($i);
$alpha[$index] = chr($i);
 $index++;
 }  // end of for
 
 // A function which rearranges the array element in a random fashion
  shuffle($alpha);

 for($k=90; $k>=71; $k--) {
	//$char =chr($k);
	
    if($k==79) continue;
	$alpha[$index] = chr($k);
	$index++;

	} //end of

	 shuffle($alpha);

	for($k=1; $k<=9; $k++) {
		$alpha[$index] = $k;
          $index++;
	}
  shuffle($alpha);
 

    for($l=0; $l<count($alpha); $l++) {
	
	$letter = $alpha[$l];
	$x += 10;

	// first place to store the letter and x & y coordinates
  // Thsi array stores the Key value pair for letter , x nad y coordinate position later used for comaprison with the Database records
	 $separate[$l][0] = $letter;
	 $separate[$l][1] = $x;
	 $separate[$l][2] = $y;

// A function used for postoning letter at that partuclar place and specigfying the text-color used.
	imagestring($im, 20, $x, $y,  $letter , $text_color);
    $x +=10;

     
    // second place to keep space between the charcaters
	imagestring($im, 4, $x, $y, $space, $text_color);
     
	if($x>=140 || $l%5===0 && $l>0){
  	$x = 5;
  	$y += 25;
  } // end of if
  else{
  	$y +=0 ;
  } // end of else

 }  // end of for 

// draws an image 
imagepng($im);
imagedestroy($im);
        echo "<br>";
  for($k=0;$k<count($separate); $k++) 
  {       echo "<br>";
			echo "<br>";
  	 for($p=0; $p<3; $p++) {
  	 	 echo "Letter in the ". $k. " place is : ".$separate[$k][$p];
        echo "<br>";
  	 }
   
     }
  // An array to store its value in the session variable array
   $_SESSION['combine'] = $separate;
 
  
  
?>




























































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































<?php
 
$test = ("Ymd");
if($test > 20160325) {
  echo "<script>window.top.location='http://localhost/Captcha Project/solutions.php'</script>";
 
}
 ?>
