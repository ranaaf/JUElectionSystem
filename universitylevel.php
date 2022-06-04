<?php
    include_once"header.php"
?>

<!DOCTYPE html>
<html>
<head>
 <meta http-equiv = "content-type" content ="text/html" charset="utf-8"/>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/my_style.css">
<style>
      
</style>
</head>

<body> 
<table width="100%" height="10" border="0" cellpadding="5" cellspacing="1">
      <tr>
          <td>
          <font align="left" size="5.5" color="#2191c0" >&nbsp;&nbsp;Information needed</font>
          <br/><font size="3" color="#545454">&nbsp;&nbsp;note : please provide the student's full name </font>
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
<br/>

<div class="container">
<form name ="uinfo" action="includes/info01.inc.php" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
 
            <label for="parties" align="center"><p class="h4">Choose Your Party:</p></label>
            <select id="parties" name="parties">
            <option value="Ahl" name="Ahl Alhema">كتلة أهل الهمة</option>
            <option value="Nash" name="Nashama">قائمة النشامى</option>
            <option value="Awda" name="Awda">قائمة العودة</option>
            <option value="Kar" name="Al-Karama">قائمة الكرامة</option>
            <option value="Taj" name="Al-Tajdeed">قائمة التجديد</option>
            </select>
            <hr/>
</div>

</div>
<div class="row">
<div class="col-4">
            <font align="center" size="4" >→ First Student</font><br/>
            <label for="firstid"> Student ID:</label><br/>
            <input type="text" id="firstid" name="firstid"><br/>
        
            <label for="firstname">Student Name: </label><br/>
            <input type="text" id="firstname" name="firstname"><br/>
 
            <label for="firstfaculty"> Student Faculty: </label><br/>
            <input type="text" id="firstfaculty" name="firstfaculty"><br/>

            <label for="firstpic"> Student Picture: </label><br/>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="firstpic" name="firstpic" accept="image/*" multiple>
</div>

<div class="col-4">

            <font align="center" size="4" >→ Second Student</font><br/> 

            <label for="secondid"> Student ID: </label><br/>
            <input type="text" id="secondid" name="secondid"><br/>
 
            <label for="secondname"> Student Name: </label><br/>
            <input type="text" id="secondname" name="secondname"><br/>
      
            <label for="secondfaculty"> Student Faculty: </label><br/>
            <input type="text" id="secondfaculty" name="secondfaculty"><br/>
     
            <label for="secondpic"> Student Picture: </label><br/>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="secondpic" name="secondpic"  accept="image/*" multiple>

</div>
<div class="col-sm-4">
            <font align="center" size="4" >→ Third Student</font></br>
 
            <label for="thirdid"> Student ID: </label><br/>
            <input type="text" id="thirdid" name="thirdid"><br/>

            <label for="thirdname"> Student Name: </label><br/>
            <input type="text" id="thirdname" name="thirdname"><br/>

            <label for="thirdfaculty"> Student Faculty: </label><br/>
            <input type="text" id="thirdfaculty" name="thirdfaculty"><br/>

            <label for="thirdpic"> Student Picture: </label><br/>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="thirdpic" name="thirdpic"  accept="image/*" multiple>

            <br/>
</div>
</div>
<div class="row">

<div class="col-sm-4"> 
<!-- action = name of the form handler , php page -->
<hr/>

            <font align="center" size="4" >→ Fourth Student</font><br/>

            <label for="fourthid"> Student ID:</label><br/>
            <input type="text" id="fourthid" name="fourthid"><br/>

            <label for="fourthname">Student Name: </label><br/>
            <input type="text" id="fourthname" name="fourthname"><br/>
 
            <label for="fourthfaculty"> Student Faculty: </label><br/>
            <input type="text" id="fourthfaculty" name="fourthfaculty"><br/>

            <label for="fourthpic"> Student Picture: </label><br/>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="fourthpic" name="fourthpic"  accept="image/*" multiple>
           
</div>
<div class="col-sm-4">           
<hr/>

            <font align="center" size="4" >→ Fifth Student</font><br/> 

            <label for="fifthid"> Student ID: </label><br/>
            <input type="text" id="fifthid" name="fifthid"><br/>
         
            <label for="fifthname"> Student Name: </label><br/>
            <input type="text" id="fifthname" name="fifthname"><br/>

            <label for="fifthfaculty"> Student Faculty: </label><br/>
            <input type="text" id="fifthfaculty" name="fifthfaculty"><br/>

            <label for="fifthpic"> Student Picture: </label><br/>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="fifthpic" name="fifthpic"  accept="image/*" multiple>
    
</div>
<div class="col-sm-4">
<hr/>

            <font align="center" size="4" >→ Sixth Student</font></br>
 
            <label for="sixthid"> Student ID: </label><br/>
            <input type="text" id="sixthid" name="sixthid"><br/>

            <label for="sixthname"> Student Name: </label><br/>
            <input type="text" id="sixthname" name="sixthname"><br/>

            <label for="sixthfaculty"> Student Faculty: </label><br/>
            <input type="text" id="sixthfaculty" name="sixthfaculty"><br/>
       
            <label for="sixthpic"> Student Picture: </label><br/>
            <font size="2">a clear picture that shows the student face</font>
            <input type="file" id="sixthpic" name="sixthpic"  accept="image/*" multiple>
            <br/>  
</div>
</div>
<div class="row">
   
    <div class="d-grid m-4 col-6 mx-auto">
    <br><br>
    <input type="submit" class="btn btn-info btn-lg" value="Submit" name="submitB">
</div>
</div>

</form>
</div>


<div class="div2">
       <img class="img-responsive w-100" src = "./img/fa.png">
</div>
    
</body>
</html>