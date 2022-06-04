<?php

if (isset($_POST["submit"])) {
   
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $faculty = $_POST["faculty"];
    $studentId = $_POST["studentId"];
    if($username[0] == '@'){
        $level = 'admin';
        $vote_status = 'off';
        $vote = 'NULL';
    }
    else{
        $level = 'user';
        $vote_status = 'off';
        $vote = 'NULL';
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // error handler
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location : ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    createUser($conn,$studentId, $name, $email, $username, $pwd, $faculty, $level, $vote, $vote_status);
}
else {
    header("location: ../signup.php");
    exit();
}
