<?php
include 'dbh.inc.php';

    $sql = "UPDATE users SET vote_status = 'on';";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['votestat']="on";
        $_SESSION['message']="Voting Started";
        header("location: ../admin.php");            
        exit();
    }