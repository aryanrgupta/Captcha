<?php
  
 

  
$servername = "localhost";
$username = "root";
$password = "robinhood";
$dbname = "animalgrid";



  if(!empty($_POST['postuserid'])  && !empty($_POST['postcom'])) 

 {
   

   if(!empty($_POST['postgrid'])) {
   /*****************************************************************************************************************************************************
 
       Storing userId, name , email ,dob ,security question, answer, letter and passpoints

 *****************************************************************************************************************************************************
 */
      // userid initialized 
 $userid = $_POST['postuserid'];
 echo "Userid ". $userid;  echo "<br>";
  echo "<br>";

  // Grid value variable used
  
  $grid2 = null;
  $grid3 = null;
  $grid4 = null;
  $grid5 = null;
  $grid6 = null;
 
 // Compare variable declaration for comparing animal click points and grid values
        $compare1x = null;
        $compare1y = null;
        $compare2x = null;
        $compare2y = null;


  // array of combine 
   $combine = $_POST['postcom'];
 // var_dump($combine);

// animal coordinates to be store
  $animal1x = $combine[1]['x'];
  $animal1y = $combine[1]['y'];
  
  if(!empty($combine[2]['x']) && !empty($combine[2]['y'])) {
    $animal2x = $combine[2]['x'];
    $animal2y = $combine[2]['y'];
  } else {
    $animal2x = null;
    $animal2y = null;
  }
  
   
   // array of digits 
  $number = $_POST['postgrid'];
  // var_dump($number);

  //echo "First value in the grid is ".$number[0];
// First value from number array is store in the $grid1 variable and  so on
  $grid1 = $number[0];
   if(!empty($number[1])) {
     $grid2 = $number[1];
   } 
  
  if(!empty($number[2])) {
     $grid3 = $number[2];
   } 
   if(!empty($number[3])) {
    $grid4 = $number[3];
  } 
  if(!empty($number[4])) {
   // echo "Number in grid5 is ".$number[4];
    echo "<br>";  
     $grid5 = $number[4];
   //  echo "Number in grid5 is ".$grid5;
  //  echo "<br>";  
   } 
   // echo "Number in grid6 is ".$number[5];
    echo "<br>";     
   
    $grid6 = $number[5];
  
   
  
    
     
   // a count variable to keep track of password length min & max
    $counter = count($combine);  
 
    $threshold = 10; 

  // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
          if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
       } 

    //   echo " Connected Successfully";



  $sql = "SELECT userid, animal1x, animal1y,animal2x,animal2y,grid1,grid2,grid3,grid4,grid5,grid6, threshold FROM passpoint";
  $result = mysqli_query($conn, $sql);

       if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if($userid==$row["userid"]) {
        
        $compare1x = $row["animal1x"];
        $compare1y = $row["animal1y"];
        $compare2x = $row["animal2x"];
        $compare2y = $row["animal2y"];
         
         /*
         echo "<br>";
         echo "Eneter animal points are animal1x ".$animal1x; echo "<br>";
         echo "Eneter animal points are animal1y ".$animal1y; echo "<br>";
          echo "Eneter animal points are animal2x ".$animal2x; echo "<br>";           
            echo "Eneter animal points are animal2y ".$animal2y; echo "<br>";
         */    
        $threshold = $row["threshold"];
        /*
         echo "threshold value in database is ".$threshold; 

         echo "<br>";
         echo "<br>";
         echo "compare database  points of compare1x ".$compare1x; echo "<br>";
         echo "<br>";
         echo "After subtracting animal1x from comapre1x value is ".($animal1x-$compare1x);
         */
         if($animal1x - $compare1x < $threshold && $animal2x - $compare2x < $threshold && $animal1y - $compare1y < $threshold && $animal2y - $compare2y < $threshold ) {
             
           /*  
              $message = "Userid has been matched"; echo "<br>";
              echo "Value of grid1 is ".$grid1; echo "<br>";
              echo "Value of grid1 from database is ".$row["grid1"]; echo "<br>";

               echo "Value of grid2 is ".$grid2; echo "<br>";
              echo "Value of grid2 from database is ".$row["grid2"]; echo "<br>";

               echo "Value of grid3 is ".$grid3; echo "<br>";
              echo "Value of grid3 from database is ".$row["grid3"]; echo "<br>";

               echo "Value of grid4 is ".$grid4; echo "<br>";
              echo "Value of grid4 from database is ".$row["grid4"]; echo "<br>";

               echo "Value of grid5 is ".$grid5; echo "<br>";
              echo "Value of grid5 from database is ".$row["grid5"]; echo "<br>";

               echo "Value of grid6 is ".$grid6; echo "<br>";
              echo "Value of grid6 from database is ".$row["grid6"]; echo "<br>";

              */
      // A condition to check whether the password grid and grid been used for that paticular userid is equal to database records or not        
               if($grid1 == $row["grid1"] && $grid2 == $row["grid2"] && $grid3 == $row["grid3"] && $grid4 == $row["grid4"] && $grid5 == $row["grid5"] && $grid6 == $row["grid6"]) {
                       
                       echo "<script>window.top.location='http://localhost/Captcha Project/file_upload.php'</script>";
                       echo " You have Successfully Logged in!";
               }

    // Issue an error if user has enetered the wrong password
                else {
                $message = "Your entered password do not match!";
        echo "<script type='text/javascript'>alert('$message');</script>";
         echo "<script>window.top.location='http://localhost/Captcha Project/gridLogin.html'</script>";
      
               }
      }

      // Issue a warning if the user has choosen wrong animal which doesnt matched with the userid
      else {
        $message = "You have choosen a wrong animal which doesnt matched with your userid";
        echo "<script type='text/javascript'>alert('$message');</script>";
         echo "<script>window.top.location='http://localhost/Captcha Project/gridLogin.html'</script>";
      
      }
      
    }
}
} else {
    echo "0 results";
}  
      
   // closes the database connection
           mysqli_close($conn);

         


       }

       // Issue a warning that user doesnt click on number image
       else {
        $message = "You must click on the Number Image to Create your Password";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>window.top.location='http://localhost/Captcha Project/gridLogin.html'</script>";
      
       }

    }  // end of if with postvariable

  // Issue a warning if some fileds value are missing
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
