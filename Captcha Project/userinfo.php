<?php
 
  
$servername = "localhost";
$username = "root";
$password = "robinhood";
$dbname = "clickanimal";

// duplicate userid found 
$found1 = false;

// duplicate email id found
$found2 = false;

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
          if (!$conn) {
               die("Connection failed: " . mysqli_connect_error());
       } 

     //  echo " Connected Successfully";

 if(!empty($_POST['postname']) && !empty($_POST['postuserid']) && !empty($_POST['postemail']) && !empty($_POST['postdate']) && 
    !empty($_POST['postquest']) && !empty($_POST['postanswer'])) {


 $userid = $_POST['postuserid'];
// echo "Userid ". $userid;  echo "<br>";
 // echo "<br>";

 // name is initialized
 $name = $_POST['postname'];
 //echo "Name is : ".$name;  echo "<br>";
//  echo "<br>";

 // email is initialized
 $email = $_POST['postemail'];
// echo "Email is : ". $email;  echo "<br>";
 // echo "<br>";

 

 // date is stored
 $date = $_POST['postdate'];
 //echo "Date is :".$date ;  echo "<br>";
 // echo "<br>";


 // question value is stored
 $question = $_POST['postquest'];
 //echo "Question is : ".$question;  echo "<br>";
 // echo "<br>";


 // answer is stored
 $answer = $_POST['postanswer'];
 //echo "Answer is : ".$answer;  echo "<br>";
 // echo "<br>";
  
 
  
      $threshold = 10;

    // array of combine 
       if(!empty($_POST['postcom'])) {


        $select = "SELECT userid , email FROM userinfo";
        $result = mysqli_query($conn , $select);

        if(mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
         if($row["userid"] == $userid) {
          $found1 = true;
          $message = "Userid Already exixts!.\\nTry again.";
       echo "<script type='text/javascript'>alert('$message');</script>"; break;


         } // end ofcompare if



       }  // end of while



        }  // end of mysqli_nums_rows if

      if(mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
         if($row["email"] == $email) {
          $found2 = true;
          $message = "Emailid Already exixts!.\\nTry again.";
       echo "<script type='text/javascript'>alert('$message');</script>"; break;


         } // end ofcompare if



       }  // end of while



        }  // end of mysqli_nums_rows if

   

   if(!$found1 && !$found2) {

      $sql = "INSERT INTO userinfo (userid, name, email, dob, security, answer)
    VALUES ('$userid', '$name', '$email' , '$date' , '$question' , '$answer')";

 
       if (mysqli_query($conn, $sql)) {
         //   echo "New record inserted in userinfo table";
           
           }

        else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
  


         $combine = $_POST['postcom'];
    //  var_dump($combine);
   // a count variable to keep track of password length min & max
    $counter = count($combine);  
 
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
 


   $pass = "INSERT INTO passpoint(userid , cross1x ,cross1y, cross2x , cross2y , threshold) 
            VALUES ('$userid', '$animal1x', '$animal1y', '$animal2x', '$animal2y', '$threshold')";

            if (mysqli_query($conn, $pass)) {
          //  echo "New record inserted in passspoint table";
                $message = "You have successfully Registered!.";
       echo "<script type='text/javascript'>alert('$message');</script>"; break;

           }

         else {
        //    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $message = "Try another userid!.";
       echo "<script type='text/javascript'>alert('$message');</script>"; break;

                     }
      
   
            mysqli_close($conn );



   }  // end of found if

   
    
       } // end of combine array if

       // Issue a warning if the user didnt click on the image to select your passpoints
       else {
           $message = "Click on the animals to choose your paspoints!.\\nTry again.";
     echo "<script type='text/javascript'>alert('$message');</script>";

       }  





 }
   // Issue a warning if some of the fields of the User details are missing
     else {
  $message = "All Fields are Compulsory to be Filled Please Make sure to Filled all the Details.\\nTry again.";
     echo "<script type='text/javascript'>alert('$message');</script>";

   }



      
  











 


?>