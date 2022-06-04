<?php

$serverName= "localhost";
$dBUsername= "root";
$dBPassword= "";
$dBName= "phpVotingSystem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Connection faild: " . mysqli_connect_error());
}
session_start();
