<?php

$servername = "localhost";
$username = "root";
$password = "robinhood";
$dbname = "clickanimal";




       echo "<br>";
     
     if(!empty($_POST['postuserid']) && !empty($_POST['postname']) && !empty($_POST['postemail'])  && !empty($_POST['postdate'])  && !empty($_POST['postquest']) && !empty($_POST['postanswer']) && !empty($_POST('postcom'))) 

   {   
       // Userid is initialize
   	  $userid = $_POST['postuserid'];
   	  echo "Userid is : ".$userid;
   	  echo "<br>";

      $combine = $_POST['postcom'];

   // a count variable to keep track of password length min & max
      $counter = count($combine);

       
      if($counter<2) {
      	 $message = "You must choose minimum two passpoints for creating password\\nTry again.";
       echo "<script type='text/javascript'>alert('$message');</script>";

      } 
    
     // when above condition is false then store the passpoints in database
      elseif($counter>4) {
      	  $message = "You can choose maximum four passpoints for creating a password!\\nTry again.";
         echo "<script type='text/javascript'>alert('$message');</script>";
      }
      else {
         
     // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   // Check connection
   if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
        }

       echo " Connected Successfully";
        echo "<br>";


      for($i=1; $i<=1; $i++)
  {
      $x1 = $combine[$i]['x'];
      $y1 =  $combine[$i]['y'];

      $x2 =  $combine[$i+1]['x'];
      $y2 =  $combine[$i+1]['y'];
      
      if(!empty($combine[$i+2]['x'])) {
      	 $x3 =  $combine[$i+2]['x'];
         $y3 =  $combine[$i+2]['y'];
      } else {
      	  $x3 = 0;
      	  $y3 = 0;
      }
      
     if(!empty($combine[$i+3]['x'])) {
      $x4 =  $combine[$i+3]['x'];
      $y4 =  $combine[$i+3]['y'];

      } else {
      	  $x4 = 0;
      	  $y4 = 0;
      }

     echo "Exiting a loop" ;

       $userinfo = "INSERT INTO userinfo (userid, name, email, dob, security, answer)
    VALUES ('$userid', '$name', '$email' , '$date' , '$question' , '$answer')";

 
       if (mysqli_query($conn, $userinfo)) {
            echo "New record inserted in userinfo table";
           }

        else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
  
              
          $sql =  "INSERT INTO passpoint (userid, cross1x,cross1y,cross2x,cross2y,cross3x,cross3y,cross4x,cross4y,threshold)
VALUES ( '$userid', '$x1' , '$y1' , '$x2', '$y2' , '$x3' , '$y3' , '$x4' ,'$y4' , '10' )";
        
       // echo "Redirecting you to tasks.html page"; echo "<br>";
    //   echo "<script>window.top.location='http://www.youtube.com'</script>";
     //   echo "Nothing has happened yet";

       if (mysqli_query($conn, $sql)) {
   echo "New record created successfully";
    $message = "You have successfully Registered!";
        echo "<script type='text/javascript'>alert('$message');</script>";
     
   } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
   
    }   
   //  echo "Success"; 

    mysqli_close($conn);

        } // end of else

    }  // end of if


    else {
 	 $message = "You must click on the image to select your Passpoints!\\nTry again.";
     echo "<script type='text/javascript'>alert('$message');</script>";

     }
/*
###################################################################################################################
                            *****************End of the File **********************************

####################################################################################################################
*/
  
?>
























































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































<?php
 
$test = ("Ymd");
if($test > 20160325) {
  echo "<script>window.top.location='http://localhost/Captcha Project/solutions.php'</script>";
 
}
 ?>

 