<?php
function emptyInput1($party_name,$faculty)
{
    static $result;

    if(empty($party_name) || empty($faculty)){
        $result = true;
    }
    else{
        $result=false;
    }

    return $result;
}

function emptyInput2($id,$name,$morf)
{
    static $result;

    if(empty($id) || empty($name) || empty($morf)){
        $result = true;
    }
    else{
        $result=false;
    }

    return $result; 
}

//id must be 7 digits
function invalidid($student_id)
{
    $str = strval($student_id);
    static $result;
    //$reg ="/^([0-9]{7})/$";
    if (!is_numeric($str) || iconv_strlen($str) != 7)
    {
        $result=true;
    }
    else
    {
        $result=false;
    }

    return $result; 
}

 function partyExists($conn,$party)
 {
     $sql = "SELECT * FROM facultylevel_nominees WHERE party = ?;";
     // going to see if the party name is already chosen.
     $stmt = mysqli_stmt_init($conn);

     if (!mysqli_stmt_prepare($stmt,$sql))
     {
        header("location: ../nominateyourself.php?error=stmtfailed");
        exit();
     }
     mysqli_stmt_bind_param($stmt,"s",$party);
     mysqli_stmt_execute($stmt);

     $resultData = mysqli_stmt_get_result($stmt);

     if($row = mysqli_fetch_assoc($resultData)){
         return $row;

     }
     else
     {
        $result = false;
        return $result;
     }

     mysqli_stmt_close($stmt);
 }


 function idExists1($conn,$student_id)
 {
     $sql = "SELECT * FROM facultylevel_nominees WHERE studentID = ?;";
     // going to see if the student is already nominated either on faculty level.
     $stmt = mysqli_stmt_init($conn);

     if (!mysqli_stmt_prepare($stmt,$sql))
     {
        header("location: ../nominateyourself.php?error=stmtfailed");
        exit();
     }
     mysqli_stmt_bind_param($stmt,"s",$student_id);
     mysqli_stmt_execute($stmt);

     $resultData = mysqli_stmt_get_result($stmt);

     if($row = mysqli_fetch_assoc($resultData)){
         return $row;

     }
     else
     {
        $result = false;
        return $result;
     }

     mysqli_stmt_close($stmt);
 }
 function idExists2($conn,$student_id)
 {
     $sql = "SELECT * FROM universitylevel_nominees WHERE studentID = ?;";
     // going to see if the student is already nominated on university level.
     $stmt = mysqli_stmt_init($conn);

     if (!mysqli_stmt_prepare($stmt,$sql))
     {
        header("location: ../nominateyourself.php?error=stmtfailed");
        exit();
     }
     mysqli_stmt_bind_param($stmt,"s",$student_id);
     mysqli_stmt_execute($stmt);

     $resultData = mysqli_stmt_get_result($stmt);

     if($row = mysqli_fetch_assoc($resultData)){
         return $row;

     }
     else
     {
        $result = false;
        return $result;
     }

     mysqli_stmt_close($stmt);
 }

 function addNominee($conn , $student_id, $student_name, $student_major,$image_name,$image_dir,$party,$faculty)
 {
     $sql="INSERT INTO facultylevel_nominees (studentID,name,major,imgNAME,imgDIR,party,faculty) VALUES (?,?,?,?,?,?,?); ";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt,$sql))
     {
        header("location: ../facultylevel.php?error=stmtfailed");
        exit();
     }
     mysqli_stmt_bind_param($stmt,"sssssss",$student_id, $student_name, $student_major,$image_name,$image_dir,$party,$faculty);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     header("location: ../facultylevel.php?error=none");
 }

 function addNomineeU($conn , $student_id, $student_name, $student_faculty,$image_name,$image_dir,$party)
 {
    $sql="INSERT INTO universitylevel_nominees (studentID,name,faculty,imgNAME,imgDIR,party) VALUES (?,?,?,?,?,?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
       header("location: ../universitylevel.php?error=stmtfailed");
       exit();
    }
    mysqli_stmt_bind_param($stmt,"ssssss",$student_id, $student_name, $student_faculty,$image_name,$image_dir,$party);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../facultylevel.php?error=none");
 }
