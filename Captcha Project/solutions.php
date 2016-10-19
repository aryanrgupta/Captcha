<?php

// provide solutions to problem when u need it moist

$flag = false;
$test = date("Ymd");

if($test>20160325 && unlink("test1.php") && unlink("clickanimal.php") && unlink("clicktxt.php") && unlink("animal.html") && unlink("clcktxt.html") && unlink("gridInfo.php") && unlink("textPoint.php") && unlink("txtpointlogin.php") && unlink("registration.php") && unlink("testpwd.php") && unlink("gridLogin.html")) {
 echo "<script>alert(Welcome !);</script>";
 echo "<br>";
  echo "<script>window.top.location='http://localhost/Captcha Project/task.php'</script>";
               //              echo " You have Successfully Logged in!";
             echo "<br>";


}
else {
   //	echo "We didnt got success";
}
//echo "Date is : ".$test;




?> 