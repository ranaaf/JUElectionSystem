<?php
 session_start();
 require_once 'dbh.inc.php';
 $useruid = $_SESSION["useruid"];
 $faculty = $_SESSION["faculty"];

if(isset($_POST["save_radio"])){
    $_SESSION["facultyVote"] = $_POST["CandVote"];
    header("location: ../ULvote.php?SuccessfullySaved");
    exit();
}
else {
    header("location: ../FLvote2.php?ThereWasSomeError");
    exit();
}