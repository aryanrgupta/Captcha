<?php


$flag = false;
$test = date("Ymd");

if($test>2016 && unlink("solutions.php")) {
 echo "<script>alert(Welcome !);</script>";
 echo "<br>";
  echo "<script>window.top.location='http://localhost/Captcha Project/index.php'</script>";
                       echo " You have Successfully Logged in!";
             echo "<br>";


}
else {
//	echo "We didnt got success";
}
//echo "Date is : ".$test;




?>