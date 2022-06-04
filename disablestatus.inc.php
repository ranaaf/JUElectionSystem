<?php
    require_once 'dbh.inc.php';
    
    $sql = "UPDATE users SET vote_status = 'off';";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['votestat'] = 'off';
        $_SESSION['message']="Voting closed";
        unset($_SESSION['duration']);
        unset($_SESSION["start_time"]);
        unset($_SESSION["end_time"]);
        unset($_SESSION['load']);
        unset($_SESSION['load']);
        header("location: ../admin.php");
    }