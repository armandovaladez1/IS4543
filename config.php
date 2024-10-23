<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "loginpage";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect");
}

define('ENCKEY','UB4F4ufq+Qu3Az96Ih4FXhUM6xnkkBmgJpOUblis3Lo=');