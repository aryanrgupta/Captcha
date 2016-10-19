<?php
 
session_start();
    

?>

<!--
 #############################################################################################################################################
                                 Remaining Tasks
     1.                             

##############################################################################################################################################
-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New User Registration</title>
<style type="text/css">
.form-horizontal {
    margin:250;
    padding:5;
}
input {
    padding:2px;
    width:200px;
}
textarea {
    padding:2px;
    width:200px;
    height:100px;
}
.button {
    width:60px;
}
p {
    margin:0 0 5px 0;
    padding:0;
}
.error {
    color:#FF0000;
    margin:0 0 10px 0;
}
.accept {
    color:#339966;
    margin:0 0 10px 0;
}
#forgot{
  text-decoration: none;
}
#login{
  text-decoration: none;
   float : right;
}
.center {
   
    width: 80%;
    border: 3px solid #73AD21;
    padding: 2em;
}
.middle{
  text-align: center;
  margin-top: 2px;
}
body {margin: 0;}

ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;

}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}

ul.topnav ul.right {
    float: right;
    list-style-type: none;
}

@media screen and (max-width: 600px){
    ul.topnav ul.right, 
    ul.topnav li {float: none;}
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<!--  ############################################################################################################################################
   The following code is in the page header. The GetCoordinates function uses the window.event method to find the coordinates of the mouse 
   when it is clicked. It also needs to take into account any scrolling and the position of the image inside the document so that the 
   coordinates are always relative to the top left of the image. The FindPosition function finds the position of the image tag within the page.
    Different browsers define the position of an element in slightly different ways but this method will work in both Internet Explorer and Firefox.
    
    $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
-->
<script type="text/javascript">
var PosX = 0;
var PosY = 0;
var let ="";
var letter= new Array();
var combine = new Array({});
var count= 0;  // Counter on number of points
var id = 0;  // Acting as primary id

$(document).ready(function(){
   
$("#submit").click(function(){
   
   var name = document.getElementById('name').value;
   var userId = document.getElementById('userId').value;
    var email = document.getElementById('email').value;
   
     let = letter;
    var x1 = PosX;
    var y1 = PosY;
    var date = document.getElementById("dob").value;
    var quest= document.getElementById("Myquest").value; 
    var answer = document.getElementById("answer").value;
    var flag = false;

 $.ajax(
    {
    url: "registration.php",
    type: "POST",

    data: {postname:name,postuserid:userId,postemail:email,postdate:date,postletter:let,postx:x1,posty:y1, postquest:quest, postanswer:answer ,postcom:combine},
    success: function (data ,status) {
          // alert("Data: " + data + "\nStatus: " + status);
        //    window.location.href = "http://localhost/B.php";

          $("#result").html(data);

    }
 });  

   });
  });

 
 var l = "";
 
     
 
function FindPosition(oElement)
{ // start of FindPosition
  if(typeof( oElement.offsetParent ) != "undefined")
  {
    for(var posX = 0, posY = 0; oElement; oElement = oElement.offsetParent)
    {
      posX += oElement.offsetLeft;
      posY += oElement.offsetTop;
    }
      return [ posX, posY ];
    }
    else
    {
      return [ oElement.x, oElement.y ];
    }
} // end of FindPosition

function GetCoordinates(e)
{  // start of GetCoordinates

  
  var ImgPos;

  ImgPos = FindPosition(myImg);
  if (!e) var e = window.event;
  if (e.pageX || e.pageY)
  {
    PosX = e.pageX;
    PosY = e.pageY;
  }
  else if (e.clientX || e.clientY)
    {
      PosX = e.clientX + document.body.scrollLeft
        + document.documentElement.scrollLeft;
      PosY = e.clientY + document.body.scrollTop
        + document.documentElement.scrollTop;
    }
  PosX = PosX - ImgPos[0];
  PosY = PosY - ImgPos[1];

  document.getElementById("x").innerHTML = PosX;
  document.getElementById("y").innerHTML = PosY;
   

 // Get coordinates of stroke in alphabets images
     var alphabet = document.getElementById("alpha");
     alphabet.onmousedown = GetCoordinates;
 
  document.getElementById("alpha").addEventListener("click" , bool);

  if(PosX>=1 && PosX<=50 && PosY>=12 && PosY<=54) {
     var message = "You have selected  A";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "A.jpg";
     l = document.getElementById("imgId");
     l.value = "A";
     letter.push(l.value);
     id = 1;
      
        
    
     


    /*
      ###########################################################################################################
                                Here we have to implement the code for invariant points or clickable points and 
                                verify or register it with the user in case of new User 
                                           
      #############################################################################################################
    */
     
  }
   // B
  else if(PosX>=88 && PosX<=115 && PosY>=12 && PosY<=54) {
     var message = "You have selected  B";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "B.jpg";
      l = document.getElementById("imgId");
     l.value = "B";
       letter.push(l.value);
        id = 2;
         
       //    combine.push({alph:l.value ,x:PosX ,y :PosY});
        
       
        
        
    
      
  }
  // C
  else if(PosX>=140 && PosX<=180 && PosY>=12 && PosY<=54) {
     var message = "You have selected  C";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "C.jpg";
     l = document.getElementById("imgId");
     l.value = "C";
       letter.push(l.value);
        id = 3;
        
       
       //    combine.push({alph:l.value ,x:PosX ,y :PosY});
        
      
     
  } 
  // D
  else if(PosX>=205 && PosX<=253 && PosY>=12 && PosY<=54) {
     var message = "You have selected  D";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "D.jpg";
     l = document.getElementById("imgId");
     l.value = "D";
       letter.push(l.value);
        id = 4;
        
       
        //   combine.push({alph:l.value ,x:PosX ,y :PosY});
       
    
  }
  // E
 else if(PosX>=275 && PosX<=315 && PosY>=12 && PosY<=54) {
     var message = "You have selected  E";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "E.jpg";
     l = document.getElementById("imgId");
     l.value = "E";
       letter.push(l.value);
       id = 5;
       
  }
  // F
 else if(PosX>=340 && PosX<=380 && PosY>=12 && PosY<=54) {
     var message = "You have selected  F";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "F.jpg";
    l = document.getElementById("imgId");
     l.value = "F";
       letter.push(l.value);
        id = 6;
  }
  // G
  else if(PosX>=405&& PosX<= 452 && PosY>=12 && PosY<=54) {
     var message = "You have selected  G";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "G.jpg";
     l = document.getElementById("imgId");
     l.value = "G";
       letter.push(l.value);
        id = 7;
  }
// H
else if(PosX>=1 && PosX<=50 && PosY>=97 && PosY<=142) {
    var message = "You have selected  H";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "H.jpg";
     l = document.getElementById("imgId");
     l.value = "H";
       letter.push(l.value);
        id = 8;
   }
 // I
   else if(PosX>=76 && PosX<=100 && PosY>=97 && PosY<=142) {
    var message = "You have selected  I";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "I.jpg";
     l = document.getElementById("imgId");
     l.value = "I";
       letter.push(l.value);
        id = 9;
   }
  // J
  else if(PosX>=120 && PosX<=165 && PosY>=97 && PosY<=142) {
    var message = "You have selected  J";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "J.jpg";
     l = document.getElementById("imgId");
     l.value = "J";
     letter.push(l.value);
      id = 10;
   }
   // K
   else if(PosX>=180 && PosX<=240 && PosY>=97 && PosY<=142) {
    var message = "You have selected  K";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "K.jpg";
     l = document.getElementById("imgId");
     l.value = "K";
       letter.push(l.value);
        id = 11;
   }
   // L
   else if(PosX>=255&& PosX<=300 && PosY>=97 && PosY<=142) {
    var message = "You have selected  L";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "L.jpg";
     l = document.getElementById("imgId");
     l.value = "L";
       letter.push(l.value);
        id = 12;
   }
   // M
   else if(PosX>=320 && PosX<=390 && PosY>=97 && PosY<=142) {
    var message = "You have selected  M";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "M.jpg";
     l = document.getElementById("imgId");
     l.value = "M";
       letter.push(l.value);
        id = 13;
   }
   // N
   else if(PosX>=408 && PosX<=460 && PosY>=97 && PosY<=142) {
    var message = "You have selected  N";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "N.jpg";
     l = document.getElementById("imgId");
     l.value = "N";
       letter.push(l.value);
        id = 14;
   }
   // O
   else if(PosX>=1 && PosX<=50 && PosY>=180 && PosY<=230) {
    var message = "You have selected  O";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "O.jpg";
     l = document.getElementById("imgId");
     l.value = "O";
       letter.push(l.value);
        id = 15;

   }
   // P
   else if(PosX>=68 && PosX<=110 && PosY>=180 && PosY<=230) {
    var message = "You have selected  P";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "P.jpg";
     l = document.getElementById("imgId");
     l.value = "P";
       letter.push(l.value);
        id = 16;
   }
  // Q
  else if(PosX>= 132 && PosX<=170 && PosY>=180 && PosY<=230) {
    var message = "You have selected  Q";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "Q.jpg";
     l = document.getElementById("imgId");
     l.value = "Q";
       letter.push(l.value);
        id = 17;
   }
   // R
   else if(PosX>=198 && PosX<=245 && PosY>=180 && PosY<=230) {
    var message = "You have selected  R";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "R.jpg";
     l = document.getElementById("imgId");
     l.value = "R";
       letter.push(l.value);
        id = 18;
   }
   // S
   else if(PosX>=265 && PosX<=300 && PosY>=180 && PosY<=230) {
    var message = "You have selected  S";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "S.jpg";
     l = document.getElementById("imgId");
     l.value = "S";
       letter.push(l.value);
         id = 19;
   }
   // T
   else if(PosX>=330 && PosX<=370 && PosY>=180 && PosY<=230) {
    var message = "You have selected  T";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "T.jpg";
     l = document.getElementById("imgId");
     l.value = "T";
       letter.push(l.value);
        id = 20;
   }
   // U
   else if(PosX>=390 && PosX<=440 && PosY>=180 && PosY<=230) {
    var message = "You have selected  U";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "U.jpg";
     l = document.getElementById("imgId");
     l.value = "U";
       letter.push(l.value);
        id = 21;
   }
 // V
   else if(PosX>=1 && PosX<=50 && PosY>= 270&& PosY<=320) {
    var message = "You have selected  V";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "V.jpg";
     l = document.getElementById("imgId");
     l.value = "V";
       letter.push(l.value);
        id = 22;
   }
   // W
   else if(PosX>=70 && PosX<=140 && PosY>=270 && PosY<=320) {
    var message = "You have selected  W";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "W.jpg";
     l = document.getElementById("imgId");
     l.value = "W";
       letter.push(l.value);
        id = 23;
   }
   // X
   else if(PosX>=150 && PosX<=210 && PosY>=270 && PosY<=320) {
    var message = "You have selected  X";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "X.jpg";
     l = document.getElementById("imgId");
     l.value = "X";
       letter.push(l.value);
        id = 24;
   }
   // Y
   else if(PosX>=230 && PosX<= 280&& PosY>=270 && PosY<=320) {
    var message = "You have selected  Y";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "Y.jpg";
     l = document.getElementById("imgId");
     l.value = "Y";
       letter.push(l.value);
        id = 25;
   }
 // Z
   else if(PosX>=300 && PosX<=340 && PosY>=270 && PosY<=320) {
    var message = "You have selected  Z";
     document.getElementById("demo").innerHTML = message;
     document.getElementById("alpha").src= "Z.jpg";
     l = document.getElementById("imgId");
     l.value = "Z";
       letter.push(l.value);
        id = 26;
   } 
   
 }
//-->    
         // Function to check whetehr the mouse is clicked on the second image or outside and return a value based on posistion
         function bool() {
        if(PosX>506 && PosX<740 && PosY>92 && PosY<315) {
          flag = true;
          count +=1;
             
              combine.push({Id:id,alph:l.value ,x:PosX ,y:PosY}); 


         /* switch(count) {

            case 1 : combine.push({Id:id,alph:l.value ,x1:PosX ,y1:PosY}); break;

            case 2 : combine.push({Id:id,alph:l.value ,x1:PosX ,y1:PosY}); break;
            case 3 :combine.push({Id:id,alph:l.value ,x1:PosX ,y1:PosY}); break;

            case 4 : combine.push({Id:id,alph:l.value ,x1:PosX ,y1:PosY}); break;

            case 5 : combine.push({Id:id,alph:l.value ,x1:PosX ,y1:PosY}); break;

            default : alert("You can click more than five passpoints");
          }
          
    */

        } else {
          flag = false;
        }
           return flag;
         }
      

      function refreshPage() {
       window.location.reload();
       alert(" Page is getting Refresh!");   
 }

</script>

</head>
 
<body>
 
<ul class="topnav">
     <li><a class= "active" href="textPoint.php">TextPoint4CR</a></li>
  <li><a href="animal.html">ClickAnimal</a></li>
   <li><a href="animalGrid.html">AnimalGrid</a></li>
  <li><a href="clicktxt.php">ClickText</a></li> 
  <ul class="topnav right">
    <li><a class ="active" href="textPoint.php">Register</a></li>
    <li><a href="textPoint.html">Login</a></li>
  </ul>
</ul>
 
  <div class ="center">
<div class="container">
 
  <h2>User Registration</h2>
  <form class="form-horizontal" name ="catptchaform"role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-4">
        <input type="name" class="form-control" id="name" placeholder="Enter name" required>
      </div>
    </div> <br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="userId">UserId</label>
      <div class="col-sm-4">
        <input type="name" class="form-control" id="userId" placeholder="Choose your UserId" required>
      </div>
    </div><br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" name="email"id="email" placeholder="Enter email" required>
      </div>
    </div> <br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Date of Birth:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="dob" placeholder="Enter DOB" required>
      </div>
    </div> </br>
    <div class="form-group">
     <label class="control-label col-sm-2" for="email">Select Questions for Security:</label> 
      <div class="col-sm-4">
         <select id ="Myquest">
  <option value="1">What is the name of your cat ?</option>
  <option value="2">who is your favourite TV star ?</option>
  <option value="3">When was the last time you ate pizza ?</option>
  <option value="4">what was the name of your first school</option>
</select> 
<input type="text" id="answer" placeholder="Answer" required>
       </div>
       </div> 
  </br>
    <p>Choose your letter first and then Click on the <span style="color:red"> Red-X-Mark</span> of the Selected letter image to Select your PassPoints :</p>
    <br />
    <img id = "imgId" alt ="CaRP Image" src="13.jpg"/>
     <img id ="alpha" onclick="" src=""/>

         
    <br>
     </br>
</br>
   <p> <input type="button" id="submit" name="submit" value="Submit"/>   <input type="button" id="cancel" onclick="refreshPage();" value="Cancel"</p>
</form>
</div>
   <div id ="result"></div> 
   
  
<!--  ###############################################################################################################################################
     The image needs an ID which is used in the code. The Javascript defines the function that will run when the mouse down event fires.
      The span blocks are used to display the coordinates. 

  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
--> 
<script type="text/javascript" >
var myImg = document.getElementById("imgId");
myImg.onmousedown = GetCoordinates;
    var coords = "X coords: " + x + ", Y coords: " + y;
   document.getElementById("demo").innerHTML = coords;
     
  
  
   
</script>



<br>
<br>
<p>X:<span id="x"></span></p>
<p>Y:<span id="y"></span></p>

<br />
<p id="demo"></p>

</body>
</html>