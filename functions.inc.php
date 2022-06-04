<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email)  || empty($username)  || empty($pwd)  || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9@]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
   $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
   $stmt = mysqli_stmt_init($conn);
   // perpared statments for security
   if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfaild");
    exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($resultData)){
       return $row;
   }
   else{
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);
}


function createUser($conn, $studentId, $name, $email, $username, $pwd, $faculty, $level, $vote, $vote_status){
    $sql = "INSERT INTO users (usersName, studentID, usersEmail, usersUid, usersPwd, faculty, level, vote, vote_status) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    // perpared statments for security
    if(!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../signup.php?error=stmtfaild");
     exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $studentId, $email,  $username, $hashedPwd, $faculty, $level, $vote, $vote_status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}



function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}


function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username); // username or email

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["userName"] = $uidExists["usersName"];
        $_SESSION["level"] = $uidExists["level"];
        $_SESSION["faculty"] = $uidExists["faculty"];
        $_SESSION["vote"] = $uidExists["vote"];
        $_SESSION["votestat"] = $uidExists["vote_status"];
        if($uidExists['level'] == "admin"){
            header("location: ../admin.php");
            exit();
        }
        else if($uidExists['level'] == "user"){
            header("location: ../index.php");
            exit();
        }
       
        
    }
}

function emptyInputForm($partyName, $faculty,$s1ID,$s1Name,
$s1Major,$s2ID, $s2Name,$s2Major, $s3ID,$s3Name,$s3Major ) {
    $result;
    if (empty($partyName) || empty($faculty) || empty($s1ID) || empty($s1Name) || empty($s1Major) 
    || empty($s2ID) || empty($s2Name) || empty($s2Major) || empty($s3ID) || empty($s3Name) || empty($s3Major)) {
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}


