<?php

require_once('dbh.inc.php');
require_once('functions2.inc.php');


if(isset($_POST['submitA'])){

   //party info
    $party_name=$_POST['pname'];
    $faculty=$_POST['faculty'];

   //first nominee
   $firstid=$_POST['firstid'];
   $firstname=$_POST['firstname'];
   $firstmajor=$_POST['firstmajor'];

     
   //second nominee
   $secondid=$_POST['secondid'];
   $secondname=$_POST['secondname'];
   $secondmajor=$_POST['secondmajor'];

   
   //third nominee
   $thirdid=$_POST['thirdid'];
   $thirdname=$_POST['thirdname'];
   $thirdmajor=$_POST['thirdmajor'];
 
   
 
    if(emptyInput1($party_name,$faculty) !== false){
       header("location: ../facultylevel.php?error=emptyinput");
       exit();
    }

   if(emptyInput2($firstid,$firstname,$firstmajor) !== false)
   {
      header("location: ../facultylevel.php?error=emptyinput");
      exit();
   }

   if(emptyInput2($secondid,$secondname,$secondmajor) !== false){
      header("location: ../facultylevel.php?error=emptyinput");
      exit();
   }

   if(emptyInput2($thirdid,$thirdname,$thirdmajor) !== false){
      header("location: ../facultylevel.php?error=emptyinput");
      exit();
   }

   
   //id must be 7 digits
   if(invalidid($firstid) !== false){
      header("location: ../facultylevel.php?error=invalidid");
      exit();
   }

   //id must be 7 digits
   if(invalidid($secondid) !== false){
      header("location: ../facultylevel.php?error=invalidid");
      exit();
   }

   
   //id must be 7 digits
   if(invalidid($thirdid) !== false){
      header("location: ../facultylevel.php?error=invalidid");
      exit();
   }
    


  if(idExists1($conn,$firstid)){
      header("location: ../facultylevel.php?error=alreadynominated1");
      exit();
   }

   if(idExists2($conn,$firstid)){
      header("location: ../facultylevel.php?error=alreadynominated1");
      exit();
   }

  

   if(idExists1($conn,$secondid)){
      header("location: ../facultylevel.php?error=alreadynominated2");
      exit();
   }

   if(idExists2($conn,$secondid)){
      header("location: ../facultylevel.php?error=alreadynominated2");
      exit();
   }
  
 
   if(idExists1($conn,$thirdid)){
       header("location: ../facultylevel.php?error=alreadynominated3");
       exit();
   }

   if(idExists2($conn,$thirdid)){
      header("location: ../facultylevel.php?error=alreadynominated3");
      exit();
  }
    
  $allowed = array('jpg','jpeg','png');

   //first nominee image
   $firstimage = $_FILES['firstpic'];
   $firstimageName = $_FILES['firstpic']['name'];
   $firstimageTmpName = $_FILES['firstpic']['tmp_name'];
   $firstimageSize = $_FILES['firstpic']['size'];
   $firstimageError = $_FILES['firstpic']['error'];
   $firstimageType = $_FILES['firstpic']['type'];

   //second nominee image
   $secondimage = $_FILES['secondpic'];
   $secondimageName = $_FILES['secondpic']['name'];
   $secondimageTmpName = $_FILES['secondpic']['tmp_name'];
   $secondimageSize = $_FILES['secondpic']['size'];
   $secondimageError = $_FILES['secondpic']['error'];
   $secondimageType = $_FILES['secondpic']['type'];

   
   //third nominee image
   $thirdimage = $_FILES['thirdpic'];
   $thirdimageName = $_FILES['thirdpic']['name'];
   $thirdimageTmpName = $_FILES['thirdpic']['tmp_name'];
   $thirdimageSize = $_FILES['thirdpic']['size'];
   $thirdimageError = $_FILES['thirdpic']['error'];
   $thirdimageType = $_FILES['thirdpic']['type'];
   
 
  $firstExt = explode('.',$firstimageName );
  $firstActualExt=strtolower(end($firstExt));
  
  $secondExt = explode('.',$secondimageName);
  $secondActualExt=strtolower(end($secondExt));
     
  $thirdExt = explode('.',$thirdimageName);
  $thirdActualExt=strtolower(end($thirdExt));


  if(in_array($firstActualExt,$allowed) && in_array($secondActualExt,$allowed) && in_array($thirdActualExt,$allowed)){
     if($firstimageError === 0 && $secondimageError === 0 && $thirdimageError === 0 ){
           $firstNameNew=$party_name."first".".".$firstActualExt;
           $fileDestination1='uploads/'.$firstNameNew;
           move_uploaded_file($firstimageTmpName,$fileDestination1);

           $secondNameNew=$party_name."second".".".$secondActualExt;
           $fileDestination2='uploads/'.$secondNameNew;
           move_uploaded_file($secondimageTmpName,$fileDestination2);

           $thirdNameNew=$party_name."third".".".$thirdActualExt;
           $fileDestination3='uploads/'.$thirdNameNew;
           move_uploaded_file($thirdimageTmpName,$fileDestination3);
     }else{
        echo "There was an error uploading your file!";
     }
  }
  else{
     echo "You cannot upload files of this type for the first student image!\n";
     echo"only images of type jpg | jpeg | png are accepted";
  }
 

   addNominee($conn , $firstid, $firstname, $firstmajor,$firstNameNew,$fileDestination1,$party_name,$faculty);
   addNominee($conn , $secondid, $secondname, $secondmajor,$secondNameNew,$fileDestination2,$party_name,$faculty);
   addNominee($conn , $thirdid, $thirdname, $thirdmajor,$thirdNameNew,$fileDestination3,$party_name,$faculty);
   
 }

     