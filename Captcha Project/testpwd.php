<?php 
 
// This file is for inserting user information and password into database for ClickText Method

// This function starts the session and listen for any previous session which has already begins and resumes the session.
  session_start();

// A variable used to store the session_variable value
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
            An if condititon to check the name , userid , date of birth , emailand answer field 
************************************************************************************************************************************/
          

      if(!empty($_POST['postname']) && !empty($_POST['postuserid']) && !empty($_POST['postemail']) && !empty($_POST['postdate']) && 
    !empty($_POST['postquest']) && !empty($_POST['postanswer'])) {
     
     // A variable used to store the userid value by using the postrequest which is receieved from other file     
        $userid = $_POST['postuserid'];
 echo "Userid ". $userid;  echo "<br>";
  echo "<br>";

 // name is initialized
 $name = $_POST['postname'];
 echo "Name is : ".$name;  echo "<br>";
  echo "<br>";

 // email is initialized
 $email = $_POST['postemail'];
 echo "Email is : ". $email;  echo "<br>";
  echo "<br>";

 

 // date is stored
 $date = $_POST['postdate'];
 echo "Date is :".$date ;  echo "<br>";
  echo "<br>";


 // question value is stored
 $question = $_POST['postquest'];
 echo "Question is : ".$question;  echo "<br>";
  echo "<br>";


 // answer is stored
 $answer = $_POST['postanswer'];
 echo "Answer is : ".$answer;  echo "<br>";
  echo "<br>";
 


   // An array used to store the value in the user clciked psoition on the image
         $combine = $_POST['postcom'];
          echo "<br>"; echo "<br>";
          $counter = count($combine);
      //    echo "Number of elements in the combine array is :".$counter;

           $userid = $_POST['postuserid'];
        //   echo "User id is :".$userid; 
         
       for($j=1; $j<=$counter; $j++) {
         echo "<br>";
        // echo "X-Coordinate is : ".$combine[$j]['x'];
          echo "<br>";
         // echo "Y-Coordinate is : ".$combine[$j]['y'];
            echo "<br>"; echo "<br>";
        } // end of for
        
    // end of if
  

     
 //  A maximum threshold value set on the X-axis and Y-axis 
    $xthreshold = 8;
    $ythreshold = 6;

    // counter for knowing thge number of that character
      $charcount = 0;  


   // password variable declaration and initilization
      $pwch1 = '';
      $pwch2 = '';
      $pwch3 = '';
      $pwch4 = '';
      $pwch5 = '';
      $pwch6 = '';
      $pwch7 = '';
      $pwch8 = '';
      $flag = false;
      $character = array();
      $j = 0;
     

   // A Condition to check the passsword length which in this case should be between 8 nad 4 characters long
    if(count($combine)<=8 && count($combine)>=4) 
    {   
         // A for loop running on the basis of password length
         for($i=1; $i<=count($combine); $i++) 
       {   
               $flag =false;      
       // current user x & y coordinates
       $userx = $combine[$i]['x']; 
       $usery = $combine[$i]['y']; 
        //  echo "<br>";
       //  echo "User X -coordinate is :".$userx;
      //    echo "<br>";

         // An if condititon to comapre user clicked position on Y Coordinate for 1 row
          if($usery>=3 && $usery<=20 )  {  
            for($k=0;$k<=5,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {  
                $flag = true;
                echo "Value in session variable is : ".$session_variable[$k][0];
                echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
                echo "Charcater choosen is :".$character[$j++];
                echo "<br>";
                echo "1st row executed";
                echo "<br>";
              //  break;
               
              } 
            }
         }

       //  An if condititon to comapre user clicked position on Y Coordinate for 2 row
               elseif($usery>=32 && $usery<=50)   {  
            for($k=6;$k<=10,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                 $flag =true;
                  echo "Value in session variable is : ".$session_variable[$k][0];
                echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
                echo "Charcater choosen is :".$character[$j++];
                echo "<br>";
                echo "2nd row executed";
                 echo "<br>";
                // break;
              } 
            }
         }


           //  An if condititon to comapre user clicked position on Y Coordinate for 3 row
          elseif($usery>=55 && $usery<=70)  
           {  
            for($k=11;$k<=15,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              { 
                $flag = true;
                 echo "Value in session variable is : ".$session_variable[$k][0];
                echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
              echo "Charcater choosen is :".$character[$j++];
                echo "<br>";
                echo "3rd row executed";
                 echo "<br>";
                // break;

              } 
            }
            
            
          }
     

         //  An if condititon to comapre user clicked position on Y Coordinate for 4 row
        elseif($usery>=80 && $usery<=95)  
          {  
            for($k=16;$k<=20,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
                 echo "Value in session variable is : ".$session_variable[$k][0];
                echo "<br>///";
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
              echo "Charcater choosen is :".$character[$j++];
                echo "<br>";
                echo "4th row executed";
                echo "<br>";
               // break;
              } 
            }
            
            
          }

       
             //  An if condititon to comapre user clicked position on Y Coordinate for 5 row
      
                elseif($usery>=105 && $usery<=120)  
          {  
            for($k=21;$k<=25,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
           
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
                echo "Charcater choosen is :".$character[$j++];
                echo "<br>";
                echo "5th row executed";
                 echo "<br>";
               //  break;
              } 
            } 
            
            
          }

    
          //  An if condititon to comapre user clicked position on Y Coordinate for 6 row
        elseif($usery>=130 && $usery<=145)  
          {  
            for($k=26;$k<=30,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
                echo "Charcater choosen is :".$character[$j++];
                echo "<br>";
                echo "6th row executed";
                 echo "<br>";
               //  break;
                
              } 
            }
            
            
          }


       //  An if condititon to comapre user clicked position on Y Coordinate for 7 row
         elseif($usery>=155 && $usery<=170)  // user clicked position on Y Coordinate for first row
          {  
            for($k=31;$k<=33,$flag==false; $k++) {
             $x = $session_variable[$k][1];  // Session variable position 
            
              if(($userx-$x)<=$xthreshold)
              {
                $flag = true;
                array_push($character , $session_variable[$k][0]);  // for 1st row value of first index will be 0
                echo "Charcater choosen is :".$character[$j++];
                echo "<br>";
                echo "7th row executed";
                 echo "<br>";
               //  break;
                 
              }
            }
            
         }
    
                    
                     
       }  // end of 1 for   
        echo "Number of characters in array is : ".$counter;
              echo "<br>";
              $incr = 1; 
             for($i=0; $i<$counter; $i++) {
          // A switch case condition to check whether the number of character and assign the value according to it       
              switch($incr) {
                  case 1:
                    $pwch1 = $character[$i];         
                    break;

                    case 2:
                    $pwch2 = $character[$i];         
                    break;

                    case 3:
                    $pwch3 = $character[$i];         
                    break;

                    case 4:
                    $pwch4 = $character[$i];                       
                    break;

                    case 5:
                    $pwch5 = $character[$i];
                   //  if(empty($pwch5)) { $pwch5 = '';}            
                    break;

                    case 6:
                    $pwch6 = $character[$i];
                  //   if(empty($pwch6)) { $pwch6 = '';}            
                    break;

                    case 7:
                    $pwch7 = $character[$i];
                   //  if(empty($pwch7)) { $pwch7 = '';}            
                    break;

                    case 8:
                    $pwch8 = $character[$i];
                   //  if(empty($pwch8)) { $pwch8 = '';}            
                    break;

              } // end of switch
            //  echo "Character choosen is : ".$character[$i];
             // echo "<br>";
              $incr += 1;
             } // end of for

    


 $servername = "localhost";
$username = "root";
$password = "robinhood";
$dbname = "clicktext";

        // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

   // Insert data into Userinfo table
  $userinfo = "INSERT INTO userinfo(userid,name,email,dob,security,answer)
          VALUES('$userid' , '$name' , '$email' , '$date' , '$question' , '$answer')";
 
      if ($conn->query($userinfo)===TRUE) {
            echo "New record inserted in userinfo table";
           // $message = "You have successfully Registered!.";
         //  echo "<script type='text/javascript'>alert('$message');</script>";
           }
  // issue an error if the userid already exists
        else {
           $message = "Try another userid for Registering yourself!.";
           echo "<script type='text/javascript'>alert('$message');</script>";

           }




  // Insert data into password table
       $sql = "INSERT INTO password (userid, pwch1, pwch2, pwch3, pwch4, pwch5, pwch6, pwch7, pwch8,threshold)
     VALUES ('$userid', '$pwch1' , '$pwch2' , '$pwch3' , '$pwch4' , '$pwch5' , '$pwch6' , '$pwch7' , '$pwch8' , '8')";

  
       if ($conn->query($sql)===TRUE) {
            echo "New record inserted in password table";
            $message = "You have successfully Registered!.";
           echo "<script type='text/javascript'>alert('$message');</script>";
           }
    // issue an error if the password has not been inserted into the password table
        else {
           echo "Error: " . $sql . "<br><br>" . $conn->error;
           }

             $conn->close();  // closing the connection to the database
      
      // var_dump($character);

    } // end of second if

    // issue an error if the $combine array contains more than  
    elseif (count($combine)>8) {
          $message = "You can select maximum eight characters for creating a Password!.\\nTry again.";
           echo "<script type='text/javascript'>alert('$message');</script>";
    }
   // issue a warning if the user has selected less than four characters
    else {
           $message = "You must select minimum four characters for creating a Password!.\\nTry again.";
           echo "<script type='text/javascript'>alert('$message');</script>";

        }

     

  } // end of first if
   // issue an error when field value is empty    
    else {
           $message = "All Fields are Compulsory to be Filled Please Make sure to Filled all the Details!!!!.\\nTry again.";
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

  