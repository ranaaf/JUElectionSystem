<?php
    include_once"header.php";
?>

<!DOCTYPE html>
<html>
<head>
 <meta http-equiv = "content-type" content ="text/html" charset="utf-8"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>

<link  rel="stylesheet"  type="text/css" href="css/my_style.css">

</head> 

<body> 
<table width="100%" height="10" border="0" cellpadding="5" cellspacing="1">
      <tr>
          <td>
          <font align="left" size="5.5" color="#2191c0">&nbsp;&nbsp;Information needed</font>
          </td>
         <td align=right>
             <div class="un">

             <ul>
                 <li><a href="">FAQs</a></li>
             </ul>
             </div>

         </td>
      </tr>
</table>

<?php include_once'includes/messages.inc.php'; ?>

<div class="container">
<form name ="info" action="includes/info00.inc.php" method="post" enctype="multipart/form-data"> 
<div class="row">
<div class="col-sm-3" style="padding-left:3% ;">
            <font align="center" size="4" >→Party Info</font><br/><br/><br><br>
            <label for="pname"><font align="center" size="4" >Party name:</font></label>
            <input type="text" id="pname" name="pname">
            <br>
            <label for="fa"><font align="center" size="4" >Faculty:</font></label> <br>
            <select id="fa" name="faculty">
            <option value="KASIT" name="KASIT">KASIT</option>
            <option value="Engineering" name="Engineering">Engineering</option>
            <option value="Arts" name="Arts">Arts</option>
            <option value="Pharmacy" name="Pharmacy">Pharmacy</option>
            <option value="Medicine" name="Medicine">Medicine</option>
            <option value="Business" name="Business">Business</option> 
            </select>   
</div>

<div class="col-sm-3" style="padding-left:3% ;">
<!-- action = name of the form handler , php page -->
            <font align="center" size="4" >→First Student</font><br/><br/>

            <label for="firstid"> Student ID:</label>
            <input type="text" id="firstid" name="firstid"> <br/>
 
            <label for="firstname">Student Name: </label>
            <input type="text" id="firstname" name="firstname" placeholder="Student's full name"><br/>
            
            <label for="secondid"> Student Major: </label>
            <input type="text" id="firstmajor" name="firstmajor"><br/>
           
            <label for="firstpic"> Student Picture: </label>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="firstpic" name="firstpic" accept="image/*" multiple><br/>

</div>         

           
<div class="col-sm-3" style="padding-left:3% ;">

            <font align="center" size="4" >→Second Student</font><br/> <br/>

            <label for="secondid"> Student ID: </label>
            <input type="text" id="secondid" name="secondid"><br/>

            
            <label for="secondname"> Student Name: </label>
            <input type="text" id="secondname" name="secondname" placeholder="Student's full name"><br/>
            

           
            <label for="secondname"> Student Major: </label>
            <input type="text" id="secondmajor" name="secondmajor"><br/>
            

            <label for="secondpic"> Student Picture: </label>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="secondpic" name="secondpic" accept="image/*" multiple><br/>
           
  
</div>
            
<div class="col-sm-3" style="padding-left:3%;">
            <font align="center" size="4" >→Third Student</font><br/><br/>

            <label for="thirdid"> Student ID: </label>
            <input type="text" id="thirdid" name="thirdid"><br/>

            <label for="thirdname"> Student Name: </label>
            <input type="text" id="thirdname" name="thirdname" placeholder="Student's full name"><br/>
          

            <label for="thirdname"> Student Major: </label>
            <input type="text" id="thirdmajor" name="thirdmajor"><br/>

   
            <label for="thirdpic"> Student Picture: </label>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="thirdpic" name="thirdpic" accept="image/*" multiple><br/>

</div>
</div> <!--row-->
    <div class="row ">
        <div class="d-grid m-2 col-6 mx-auto">
            <br><br>
            <input class="btn btn-primary btn-lg" type="submit" value="Submit" name="submitA" ></div>
    </div>
</form>
</div> <!--//container1-->

  

    <div class="div2">
       <img class="img-responsive w-100" src = "./img/fa.png">
    </div>

    
</body> 
</html>