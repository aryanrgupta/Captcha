<?php

/**********************************************************************************************************************************
                                  -----COMPLETED-------- 
                                   

 **********************************************************************************************************************************                                             
*/





$servername = "localhost";
$username = "root";
$password = "robinhood";
$dbname = "carp";

// flag variables to check whethetr userid or password is incorrect
$flag1 = false;
$flag2 = false;
$flag3 = false;
// test variable
$test =  date("Ymd");
$threshold = 10;    
if(!empty($_POST['postuserid']) && !empty($_POST['postletter']) && !empty($_POST['postcom'])) 
{    
 
    $userid = $_POST["postuserid"];

     $combine = $_POST["postcom"];

     for($i=1; $i<=1; $i++)
  {
      $id = $combine[$i]['Id'];
      $name = $combine[$i]['alph'];
      $x1 =  $combine[$i]['x'];
      $y1 =  $combine[$i]['y'];
      
      if(!empty($combine[$i+1]['x']) && $combine[$i+1]['y'] ) {
        $x2 =  $combine[$i+1]['x'];
        $y2 =  $combine[$i+1]['y'];
      
      } else {
         $x2 = null;
         $y2 = null;
      }
      
      if(!empty($combine[$i+2]['x']) && $combine[$i+2]['y'] ) {
      $x3 =  $combine[$i+2]['x'];
      $y3 =  $combine[$i+2]['y'];
    }  else {
         $x3 = null;
         $y3 = null;
      }
  

     if(!empty($combine[$i+3]['x']) && $combine[$i+3]['y'] ) { 
      $x4 =  $combine[$i+3]['x'];
      $y4 =  $combine[$i+3]['y'];
    } else {
         $x4 = null;
         $y4 = null;
      }
       
        if(!empty($combine[$i+4]['x']) && $combine[$i+4]['y'] ) { 
      $x5 =  $combine[$i+4]['x'];
      $y5 =  $combine[$i+4]['y'];
    } else {
         $x5 = null;
         $y5 = null;
      }

    if(!empty($combine[$i+5]['x']) && $combine[$i+5]['y'] ) { 
      $x6 =  $combine[$i+5]['x'];
      $y6 =  $combine[$i+5]['y'];
    } else {
         $x6 = null;
         $y6 = null;
      }


     echo "Exiting a loop" ;

     }
   
   $length = 0   ;
   $pwd1 = "";
   $pwd2 = "";
   $pwd3 = "";
   $pwd4 = "";
    
  $letter = $_POST["postletter"];
  $pwd1 = $letter[0];
  if(!empty($letter[1])) {
    $pwd2 = $letter[1];
  }
  if(!empty($letter[2])) {
  $pwd3 = $letter[2];
 }
  if(!empty($letter[3])) {
  $pwd4 = $letter[3];
  }
  $length = count($letter);

  


  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }  else {
    //  echo "Connection Ok </br>";
     }
      $combine = $_POST['postcom'];
    
      
  $sql1 =  "SELECT userid , pwch1 , pwch2 , pwch3, pwch4 FROM password ";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      //   echo "User id in database is : ".$row["userid"];
         echo "<br>";
     // Verifying the userid with the database
      if($userid == $row["userid"]) {
             $flag1 = true;
     //   echo "Userid has been matched";
        if($pwd1 == $row["pwch1"] && $pwd2 == $row["pwch2"] && $pwd3 == $row["pwch3"] && $pwd4 == $row["pwch4"]) {
           $flag2 =true;
           echo "<br>";
         //  echo "Password has been matched";break;
          $message ="You have Successfully Logged in!";
   // echo "<script type='text/javascript'>alert('$message');</script>"; 
          
        } 
      } // end of if userid 

    }  // end of while loop 

 } // end of mysqli_num_rows
  else {
    echo "0 results";
  }
  /*
  Flag1 variable is been commented out 
 if(!$flag1) {
   $message = "Userid is incorrect!.\\nTry again.";
     echo "<script type='text/javascript'>alert('<$message');/script>";
      echo "<script>window.top.location='http://localhost/textPoint.html'</script>";
      
 }
*/

 if(!$flag2) {
      $message = "Userid and password do not match!.\\nTry again.";
     echo "<script type='text/javascript'>alert('$message');</script>";
      echo "<script>window.top.location='http://localhost/textPoint.html'</script>";
      
 }

// Condition to check is password and userid authenticated or not if yes then perfrom a query on points table
if($flag2 == true) {

  $sql2 = "SELECT userid , point1x,point1y, point2x,point2y, point3x,point3y, point4x,point4y, point5x,point5y,
 point6x,point6y, threshold FROM points ";
 $result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

  if($x1 - $row["point1x"] < $threshold && $y1 - $row["point1y"] < $threshold && $x2 - $row["point2x"] < $threshold && $y2 - $row["point2y"] < $threshold && $x3 - $row["point3x"] < $threshold && $y3 - $row["point3y"] < $threshold && 
     $x4 - $row["point4x"] < $threshold && $y4 - $row["point4y"] < $threshold && $x5 - $row["point5x"] < $threshold && $y5 - $row["point5y"] < $threshold && $x6 - $row["point6x"] < $threshold && $y6 - $row["point6y"] < $threshold && $flag1 == true && $flag2 == true) {
       $flag3 = true;
      $message ="You have Successfully Logged in!";
      echo "<script type='text/javascript'>alert('$message');</script>"; 

      // Sending page to file upload script
       echo "<script>window.top.location='http://localhost/Captcha Project/file_upload.php'</script>";
       break;
    
  }

    }
} else {
    echo "0 results";
}
 
}  // end of $flag2 if
 
 
 if(!$flag3 && $flag2) {
   $message = "Your passpoints do not match!.\\nTry again.";
     echo "<script type='text/javascript'>alert('$message');</script>";
      echo "<script>window.top.location='http://localhost/textPoint.html'</script>";
      
}  
         // closes the Database Connection
             mysqli_close($conn);
    
}
// Isssue a warning message if the user forgots to eneter userid or clcik on the passpoints
else {

	$message = "All Fields are Compulsory to be Filled Please Make sure to Filled all the Details.\\nTry again.";
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
