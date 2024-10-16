<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "loginpage";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect");
}