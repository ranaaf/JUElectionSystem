<?php

require'dbh.inc.php';
require'functions2.inc.php';
 

if(isset($_POST['submitB'])){

    //party info
    $party=$_POST['parties'];
    

      //first nominee
   $firstid=$_POST['firstid'];
   $firstname=$_POST['firstname'];
   $firstfaculty=$_POST['firstfaculty'];

     
   //second nominee
   $secondid=$_POST['secondid'];
   $secondname=$_POST['secondname'];
   $secondfaculty=$_POST['secondfaculty'];

   
   //third nominee
   $thirdid=$_POST['thirdid'];
   $thirdname=$_POST['thirdname'];
   $thirdfaculty=$_POST['thirdfaculty'];

    //fourth nominee
   $fourthid=$_POST['fourthid'];
   $fourthname=$_POST['fourthname'];
   $fourthfaculty=$_POST['fourthfaculty'];

    //fifth nominee
   $fifthid=$_POST['fifthid'];
   $fifthname=$_POST['fifthname'];
   $fifthfaculty=$_POST['fifthfaculty'];

    //sixth nominee
    $sixthid=$_POST['sixthid'];
    $sixthname=$_POST['sixthname'];
    $sixthfaculty=$_POST['sixthfaculty'];
 

   if(emptyInput2($firstid,$firstname,$firstfaculty) !== false)
   {
      header("location: ../universitylevel.php?error=emptyinput");
      exit();
   }

   if(emptyInput2($secondid,$secondname,$secondfaculty) !== false){
      header("location: ../universitylevel.php?error=emptyinput");
      exit();
   }

   if(emptyInput2($thirdid,$thirdname,$thirdfaculty) !== false){
      header("location: ../universitylevel.php?error=emptyinput");
      exit();
   }

   if(emptyInput2($fourthid,$fourthname,$fourthfaculty) !== false){
    header("location: ../universitylevel.php?error=emptyinput");
    exit();
   }

   if(emptyInput2($fifthid,$fifthname,$fifthfaculty) !== false){
    header("location: ../universitylevel.php?error=emptyinput");
    exit(); 
   }

   if(emptyInput2($sixthid,$sixthname,$sixthfaculty) !== false){
    header("location: ../universitylevel.php?error=emptyinput");
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
    
    //id must be 7 digits
    if(invalidid($fourthid) !== false){
        header("location: ../facultylevel.php?error=invalidid");
        exit();
    }

    //id must be 7 digits
   if(invalidid($fifthid) !== false){
    header("location: ../facultylevel.php?error=invalidid");
    exit();
    }

  //id must be 7 digits
   if(invalidid($sixthid) !== false){
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

   if(idExists1($conn,$fourthid)){
      header("location: ../facultylevel.php?error=alreadynominated4");
      exit();
   }

   if(idExists2($conn,$fourthid)){
    header("location: ../facultylevel.php?error=alreadynominated4");
    exit();
   }

   if(idExists1($conn,$fifthid)){
      header("location: ../facultylevel.php?error=alreadynominated5");
      exit();
   }

   if(idExists2($conn,$fifthid)){
    header("location: ../facultylevel.php?error=alreadynominated5");
    exit();
   }

   if(idExists1($conn,$sixthid)){
      header("location: ../facultylevel.php?error=alreadynominated6");
      exit();
   }

   if(idExists2($conn,$sixthid)){
    header("location: ../facultylevel.php?error=alreadynominated6");
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

   //fourth nominee image
   $fourthimage = $_FILES['fourthpic'];
   $fourthimageName = $_FILES['fourthpic']['name'];
   $fourthimageTmpName = $_FILES['fourthpic']['tmp_name'];
   $fourthimageSize = $_FILES['fourthpic']['size'];
   $fourthimageError = $_FILES['fourthpic']['error'];
   $fourthimageType = $_FILES['fourthpic']['type'];

   //fifth nominee image
   $fifthimage = $_FILES['fifthpic'];
   $fifthimageName = $_FILES['fifthpic']['name'];
   $fifthimageTmpName = $_FILES['fifthpic']['tmp_name'];
   $fifthimageSize = $_FILES['fifthpic']['size'];
   $fifthimageError = $_FILES['fifthpic']['error'];
   $fifthimageType = $_FILES['fifthpic']['type'];

   //sixth nominee image
   $sixthimage = $_FILES['sixthpic'];
   $sixthimageName = $_FILES['sixthpic']['name'];
   $sixthimageTmpName = $_FILES['sixthpic']['tmp_name'];
   $sixthimageSize = $_FILES['sixthpic']['size'];
   $sixthimageError = $_FILES['sixthpic']['error'];
   $sixthimageType = $_FILES['sixthpic']['type'];
   
 
  $firstExt = explode('.',$firstimageName );
  $firstActualExt=strtolower(end($firstExt));
  
  $secondExt = explode('.',$secondimageName);
  $secondActualExt=strtolower(end($secondExt));
     
  $thirdExt = explode('.',$thirdimageName);
  $thirdActualExt=strtolower(end($thirdExt));

  $fourthExt = explode('.',$fourthimageName);
  $fourthActualExt=strtolower(end($fourthExt));

  $fifthExt = explode('.',$fifthimageName);
  $fifthActualExt=strtolower(end($fifthExt));

  $sixthExt = explode('.',$sixthimageName);
  $sixthActualExt=strtolower(end($sixthExt));


  if(in_array($firstActualExt,$allowed) && in_array($secondActualExt,$allowed) && in_array($thirdActualExt,$allowed) && 
  in_array($fourthActualExt,$allowed) && in_array($fifthActualExt,$allowed) && in_array($sixthActualExt,$allowed)){
     if($firstimageError === 0 && $secondimageError === 0 && $thirdimageError === 0 && 
        $fourthimageError === 0 && $fifthimageError === 0 && $sixthimageError === 0 ){
           $firstNameNew=$party."first".".".$firstActualExt;
           $fileDestination1='uploadsU/'.$firstNameNew;
           move_uploaded_file($firstimageTmpName,$fileDestination1);

           $secondNameNew=$party."second".".".$secondActualExt;
           $fileDestination2='uploadsU/'.$secondNameNew;
           move_uploaded_file($secondimageTmpName,$fileDestination2);

           $thirdNameNew=$party."third".".".$thirdActualExt;
           $fileDestination3='uploadsU/'.$thirdNameNew;
           move_uploaded_file($thirdimageTmpName,$fileDestination3);

           $fourthNameNew=$party."fourth".".".$fourthActualExt;
           $fileDestination4='uploadsU/'.$fourthNameNew;
           move_uploaded_file($fourthimageTmpName,$fileDestination4);

           $fifthNameNew=$party."fifth".".".$fifthActualExt;
           $fileDestination5='uploadsU/'.$fifthNameNew;
           move_uploaded_file($fifthimageTmpName,$fileDestination5);

           $sixthNameNew=$party."sixth".".".$sixthActualExt;
           $fileDestination6='uploadsU/'.$sixthNameNew;
           move_uploaded_file($sixthimageTmpName,$fileDestination6);


     }else{
        echo "There was an error uploading your file!";
     }
  }
  else{
     echo "You cannot upload files of this type for the first student image!\n";
     echo"only images of type jpg | jpeg | png are accepted";
  }
 

   addNomineeU($conn , $firstid, $firstname,$firstfaculty,$firstNameNew,$fileDestination1,$party);
   addNomineeU($conn , $secondid, $secondname,$secondfaculty,$secondNameNew,$fileDestination2,$party);
   addNomineeU($conn , $thirdid, $thirdname, $thirdfaculty,$thirdNameNew,$fileDestination3,$party);
   addNomineeU($conn , $fourthid, $fourthname, $fourthfaculty,$fourthNameNew,$fileDestination4,$party);
   addNomineeU($conn , $fifthid, $fifthname, $fifthfaculty,$fifthNameNew,$fileDestination5,$party);
   addNomineeU($conn , $sixthid, $sixthname, $sixthfaculty,$sixthNameNew,$fileDestination6,$party);

   header("location: ../nominateyourself.php?error=none");
   exit();
 }

     