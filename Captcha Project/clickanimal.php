<!--
 #############################################################################################################################################
                          This file is used for Clickanimal Functionality ANd its acting as User registration form

                                 

##############################################################################################################################################
-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New User Registration</title>
<style type="text/css">
.container {
    margin:250;
    padding-left:15em;
}
input {
    padding:2px;
    width:200px;
}

.button {
    width:30px;
}
p {
    margin:0 0 5px 0;
    padding:0;
}
#forgot{
  text-decoration: none;
}
 body {
  background-image : "bck_grndimg.jpg" ;
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
.Coordinates{
  padding-left: 2em;
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
var combine = new Array({});
var count= 0;  // Counter on number of points

$(document).ready(function(){
   
$("#submit").click(function(){
   var name = document.getElementById('name').value;
   var userId = document.getElementById('userId').value;
    var email = document.getElementById('email').value;
    var date = document.getElementById("dob").value;
    var quest= document.getElementById("Myquest").value; 
    var answer = document.getElementById("answer").value;
    var flag = false;
   
    $.ajax(
    {
    url: "userinfo.php",
    type: "POST",

    data: { postname : name , postuserid:userId, postemail : email, postdate: date , postanswer : answer , postquest : quest ,postcom:combine},
    success: function (data ,status) {
          // alert("Data: " + data + "\nStatus: " + status);
        //    window.location.href = "http://localhost/B.php";

          $("#result").html(data);

    }
 }); 



   });
  });


 // When Cancel button is pressed it reloads the same page
 function refreshPage() {
   
   window.location.reload();
 }
 
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
    
    document.getElementById("imgId").addEventListener("click" , bool);


 }

       // When Cancel button is pressed it reloads the same page
 function refreshPage() {
   alert(" The entered data will be deleted Function got executed");
   window.location.reload();
 }
//-->    
         // Function to check whetehr the mouse is clicked on the second image or outside and return a value based on posistion
         function bool() {
         
        if(PosX>5 && PosX<545 && PosY>1 && PosY<445) {
          flag = true;
          count = combine.length;
             
              combine.push({x:PosX ,y:PosY}); 
              if(count > 2 ){
                   /*    
                   for(var i=1; i<=count; i++) {
                     document.write("X-coordinate is : " + combine[i]['x'] + " Y -coordinate is : " + combine[i]['y']);
                     document.write("<br>"); document.write("<br>"); document.write("<br>");
                  } // end of for
                   */ 
                   combine.length = 0;
                  

                 
                  alert("You can choose max two animals for your password!");
                  

                }  // end of if  
                

        } else {
          flag = false;
        }  
           return flag;
         }
      
</script>

</head>
 
<body >
 
 <ul class="topnav">
  <li><a class="active" href="clickanimal.php">ClickAnimal</a></li>
  <li><a href="clicktxt.php">ClickText</a></li>
   <li><a href="gridLogin.html">AnimalGrid</a></li>
  <li><a href="textPoint.html">TextPoint4CR</a></li>
  <ul class="topnav right">
    <li><a class ="active" href="clickanimal.php">Register</a></li>
    <li><a  href="animal.html">Login</a></li>
  </ul>
</ul>
 
<div class="container">
  <h2>User Registration</h2>
  <form class="form-horizontal" name ="catptchaform"role="form" >
    <div class="form-group">
      <label>Name</label>
      <div class="col-sm-6">
        <input type="name" class="form-control" id="name" placeholder="Enter name" required>
      </div>
    </div> <br>
    <div class="form-group">
      <label >UserId</label>
      <div class="col-sm-4">
        <input type="name" class="form-control" id="userId" placeholder="Choose your UserId" required>
      </div>
    </div><br>
    <div class="form-group">
      <label >Email:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
      </div>
    </div> <br>
    <div class="form-group">
      <label >Date of Birth:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="dob" placeholder="Enter DOB" required>
      </div>
    </div> </br>
    <div class="form-group">
     <label>Select Questions for Security:</label> 
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
    <p>Choose your PassPoints by clicking on the specific position for creating a Password :</p>
    <br />
    <img id = "imgId" width="550" height="450" alt ="CaRP Image" src="animal.jpg"/>
              
    <br>
     </br>
</br> <span style="display: inline;">
    <input type="submit" id="submit" name="submit" value="Submit"/>
     <input type="button" id="cancel" onclick="refreshPage();" value="Cancel"/>
   </span>
</form>
   
  
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

<div class = "Coordinates">
<p>X:<span id="x"></span></p>
<p>Y:<span id="y"></span></p>
</div>
<br />
<p id="demo"></p>

<div id ="result"></div> 
   

</body>
</html>