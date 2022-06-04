<?php 
session_start();
require_once 'dbh.inc.php';
$useruid = $_SESSION["useruid"];

if(isset($_POST['clearVote']))
{
    unset($_SESSION["facultyVote"]);
    unset($_SESSION["uniVote"]);
    header("location: ../FLvote2.php?error=voteReset");
   
}
else if(isset($_REQUEST['submitvote']))
{

    $facultyVote = $_SESSION["facultyVote"];
    $uniVote = $_SESSION["uniVote"];

    $faculty = $_SESSION["faculty"];


    $query = "INSERT INTO Vote_faculty (useruid, CandNameVote, faculty) VALUES ('$useruid','$facultyVote','$faculty')";
    $query_run = mysqli_query($conn, $query);


    $query1 = "INSERT INTO Vote_uni (useruid, CandNameVote) VALUES ('$useruid','$uniVote')";
    $query_run1 = mysqli_query($conn, $query1);


    $sql="UPDATE users SET vote = ? WHERE usersUid = ? ; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql))
    {
       header("location: ../facultylevel.php?error=stmtfailed");
       exit();
    }
    $vote='DONE';
    mysqli_stmt_bind_param($stmt,"ss",$vote,$useruid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

     if($resultData){
        $result = false;
     }
     else
     {
        $result = true;
     }
    mysqli_stmt_close($stmt);

    if($result == false)
    {
    header("location: ../Review.php?error=NO");
    }
    else{
   $_SESSION['vote']= 'DONE';
    header("location: ../vote.php?error=submitted");
    
    }

}
