<?php
 session_start();
 require_once 'dbh.inc.php';
 $useruid = $_SESSION["useruid"];

if(isset($_POST["save_radio"])){

    $_SESSION["uniVote"] = $_POST["CandVote"];
    header("location: ../Review.php?SuccessfullySaved");
    exit();
}
else
{
    header("location: ../ULvote.php?ThereWasSomeError");
    exit();
}
