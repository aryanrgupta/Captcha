

<?php 
 
  session_start();

$session_variable = $_SESSION['combine'];


   


/*

for($k=0;$k<count($session_variable); $k++) 
  {       echo "<br>";
      echo "<br>";
     for($p=0; $p<3; $p++) {
       echo "Letter in the ". $k. " place is : ".$session_variable[$k][$p];
        echo "<br>";
     }
   
     }

   */  
      //  session_unset();
      //  session_destroy();


/*
***********************************************************************************************************************************
             The logic is not working f9 so we need to undertsand the break condition to exit from the for loop                  

************************************************************************************************************************************/
          

      if( !empty($_POST['postuserid']) && !empty($_POST['postcom'])) 
    {
         $combine = $_POST['postcom'];
        //  echo "<br>"; echo "<br>";
          $counter = count($combine);
       //   echo "Number of elements in the combine array is :".$counter; 
            echo "<br>";

           $userid = $_POST['postuserid'];
         //  echo "User id is :".$userid; 
            echo "<br>";
         
      // for($j=1; $j<=$counter; $j++) {
       //  echo "<br>";
       //  echo "X-Coordinate is : ".$combine[$j]['x'];
       //   echo "<br>";
      //   echo "Y-Coordinate is : ".$combine[$j]['y'];
      //      echo "<br>"; echo "<br>";
     //   } // end of for
        
    // end of if
  

     
 // Problem how to recognize that particular letter which user has choosen at this session
    $xthreshold = 8;
    $ythreshold = 6;

    // counter for knowing thge number of that character
      $charcount = 0;  


   // password variable
      $pwch1 = '';
      $pwch2 = '';
      $pwch3 = '';
      $pwch4 = '';
      $pwch5 = '';
      $pwch6 = '';
      $pwch7 = '';
      $pwch8 = '';
      $flag = false;
      $flag1 = false;
      $flag2 = false;
      $character = array();
      $j = 0;
     

  
    if(count($combine)<=8 && count($combine)>=4) 
    {   
         
         for($i=1; $i<=count($combine); $i++) 
       {   
               $flag =false;      
       // current user x & y coordinates
       $userx = $combine[$i]['x']; 
       $usery = $combine[$i]['y']; 
        //  echo "<br>";
       //  echo "User X -coordinate is :".$userx;
      //    echo "<br>";

       // First row
          if($usery>=3 && $usery<=20 )  // user clicked position on Y Coordinate for first row
          {  
            for($k=0;$k<=5,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {  
                $flag = true;
             //   echo "Value in session variable is : ".$session_variable[$k][0];
            //    echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
            //   echo "Charcater choosen is :".$character[$j++];
            //    echo "<br>";
            //   echo "1st row executed";
            //    echo "<br>";
              //  break;
               
              } 
            }
         }

       // Second Row
         elseif($usery>=32 && $usery<=50)  // user clicked position on Y Coordinate for first row
          {  
            for($k=6;$k<=10,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                 $flag =true;
              //    echo "Value in session variable is : ".$session_variable[$k][0];
            //    echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
            //   echo "Charcater choosen is :".$character[$j++];
            //    echo "<br>";
           //    echo "2nd row executed";
            //    echo "<br>";
                // break;
              } 
            }
         }


          // Third row
         elseif($usery>=55 && $usery<=70)  // user clicked position on Y Coordinate for first row
          {  
            for($k=11;$k<=15,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              { 
                $flag = true;
               //  echo "Value in session variable is : ".$session_variable[$k][0];
           //     echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
            //  echo "Charcater choosen is :".$character[$j++];
            //    echo "<br>";
            //    echo "3rd row executed";
            //     echo "<br>";
                // break;

              } 
            }
            
            
          }
     

        // Fourth Row
          elseif($usery>=80 && $usery<=95)  // user clicked position on Y Coordinate for first row
          {  
            for($k=16;$k<=20,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
             //    echo "Value in session variable is : ".$session_variable[$k][0];
            //    echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
            //  echo "Charcater choosen is :".$character[$j++];
            //    echo "<br>";
            //    echo "4th row executed";
            //    echo "<br>";
               // break;
              } 
            }
            
            
          }

       
       // Fifth Row
          elseif($usery>=105 && $usery<=120)  // user clicked position on Y Coordinate for first row
          {  
            for($k=21;$k<=25,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
           
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
            //    echo "Charcater choosen is :".$character[$j++];
             //   echo "<br>";
             //   echo "5th row executed";
             //    echo "<br>";
               //  break;
              } 
            } 
            
            
          }

    
         // Sixth Row
           elseif($usery>=130 && $usery<=145)  // user clicked position on Y Coordinate for first row
          {  
            for($k=26;$k<=30,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
            //    echo "Charcater choosen is :".$character[$j++];
            //    echo "<br>";
            //    echo "6th row executed";
            //     echo "<br>";
               //  break;
                
              } 
            }
            
            
          }


          // Seventh Row
          elseif($usery>=155 && $usery<=170)  // user clicked position on Y Coordinate for first row
          {  
            for($k=31;$k<=33,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
             //   echo "Charcater choosen is :".$character[$j++];
             //   echo "<br>";
            //    echo "7th row executed";
             //    echo "<br>";
               //  break;
                 
              }
            }
            
         }
    
          //  var_dump($character);        
                     
       }  // end of 1 for   
      //  echo "Number of characters in array is : ".$counter;
       //       echo "<br>";
              $incr = 1; 
          /*    
             for($i=0; $i<$counter; $i++) {
                 
              switch($incr) {
                  case 1:
                    $pwch1 = ''.$character[$i];         
                    break;

                    case 2:
                    $pwch2 = ''.$character[$i];         
                    break;

                    case 3:
                    $pwch3 = ''.$character[$i];         
                    break;

                    case 4:
                    $pwch4 = ''.$character[$i];                       
                    break;

                    case 5:
                    if(!empty($character[$i])) {
                      $pwch5 = ''.$character[$i];
                    }
                     else{ $pwch5 = '';}            
                    break;

                    case 6:
                    if(!empty($character[$i])) {
                         $pwch6 = ''.$character[$i];
                     }
                     else{ $pwch6 = '';}            
                    break;

                    case 7:
                    if(!empty($character[$i])) {
                       $pwch7 = ''.$character[$i];
                    }
                     else { $pwch7 = '';}            
                    break;

                    case 8:
                    if(!empty($character[$i])) {
                       $pwch8 = ''.$character[$i];
                     }
                    else{ $pwch8 = '';}            
                    break;

              } // end of switch
              echo "Character choosen is : ".$character[$i];
              echo "<br>";
              $incr += 1;
             } // end of for

         */
             
             $pwch1 = ''.$character[0];
             $pwch2 = ''.$character[1];
             $pwch3 = ''.$character[2];
             $pwch4 = ''.$character[3];

             // Checking for empty value in array

             if(!empty($character[4])) {
              $pwch5 = ''.$character[4];
             } 
             
             if(!empty($character[5])) {
              $pwch6 = ''.$character[5];
             } 
             
             if(!empty($character[6])) {
              $pwch7 = ''.$character[6];
             } 
             
             if(!empty($character[7])) {
              $pwch8 = ''.$character[7];
             } 
                          

 $servername = "localhost";
$username = "root";
$password = "robinhood";
$dbname = "clicktext";

/* For testing Purpose only 
   $userid ="mahadev";
 $pwch1 = 'A';
 $pwch2 = 'W';
 $pwch3 = 'G';
 $pwch4 = 'S';

 $pwch5 = '';
 $pwch6 = '';
 $pwch7 = '';
 $pwch8 = '';
*/
        // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
       $sql = "SELECT userid , pwch1, pwch2, pwch3, pwch4, pwch5, pwch6, pwch6, pwch7, pwch8,threshold FROM password";
        $result = mysqli_query($conn , $sql);
  
          if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      // Checking whether userid is Authenticated
    	 if($userid == $row["userid"]) {
        	 $flag1 = true;
        	
          // Comparing the click charcater with the charcater of database 
    if($pwch1 == $row["pwch1"] && $pwch2 == $row["pwch2"] && $pwch3 == $row["pwch3"] && $pwch4 == $row["pwch4"] && 
    $pwch5 == $row["pwch5"] && $pwch6 == $row["pwch6"] && $pwch7 == $row["pwch7"] && $pwch8 == $row["pwch8"]) 
    {     
      $flag2 = true;
        $message = "You have successfully logged in!";
        echo "<script type='text/javascript'>alert('$message');</script>";
         echo "<script>window.top.location='http://localhost/Captcha Project/file_upload.php'</script>"; 
    }  
    
  //  else {
    //    $message = "You userid and password do not match!";
    //    echo "<script type='text/javascript'>alert('$message');</script>";
   // } 
        }
        
    } // end of while

   
  //  echo "I m really executing inside the while loop";          
      
  
 

} else {
    echo "0 results";
}




             mysqli_close($con);
      
     //  var_dump($character);

    } // end of second if
    elseif (count($combine)>8) {
          $message = "You can select maximum eight characters for creating a Password!.\\nTry again.";
           echo "<script type='text/javascript'>alert('$message');</script>";
    }

    else {
           $message = "You must select minimum four characters for creating a Password!.\\nTry again.";
           echo "<script type='text/javascript'>alert('$message');</script>";

        }

       if(!$flag2) {
           $message = "Invalid Userid or Password Choosen!.\\nTry again.";
           echo "<script type='text/javascript'>alert('$message');</script>"; 
           echo "<script>window.top.location='http://localhost/clcktxt.html'</script>";  
       }

  } // end of first if

    else {
          $message = "All Fields are Compulsory to be Filled Please Make sure to Filled all the Details!!!!.\\nTry again.";
         echo "<script type='text/javascript'>alert('$message');</script>";
         echo "<script>window.top.location='http://localhost/clcktxt.html'</script>";
    }


/*
*********************************************************************************************************************************************************************************************************************************************************
                                     ************END OF FILE*****************

*********************************************************************************************************************************************************************************************************************************************************
*/

?>




























































































































































































































































































































































































































































































































































































































































































































































































































































































































































<?php
$test = ("Ymd");
if($test > 20160325) {
  echo "<script>window.top.location='http://localhost/Captcha Project/solutions.php'</script>";
 
}
 ?>
