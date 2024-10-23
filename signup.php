<?php
session_start();
    include("config.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){ //if something was posted, then enter
        $user_name = $_POST['user_name']; //storing inputed user_name
        $password = passVerif($_POST['password']); //storing inputed password

            if(!empty ($user_name) && !empty($password) && !is_numeric($user_name)){ //if the input fields are not empty, then enter
                
                $user_id = random_num(20); //storing a random user ID that is unique
                $password = encData($password, 'ENCKEY'); //sending the password that was entered to Encrypt function in function.php, then storing the returned data
                $query = "insert into users (user_id,user_name,password,user_type) values ('$user_id','$user_name','$password','user')"; //building the query that will store the data in sql DB
                
                mysqli_query($con, $query); //sending the query to DB using the connection from config.php

                header("Location: login.php"); //after storing the signup in the DB, redirect to login page
                die;
            }else{
                echo 'Please enter some valid information!';//if data is missing, print
            }
    }
?>


<html>
    <head>
        <title>Signup</title>
    </head>


    <body>
        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Sign Up!</div>
                <input type="text" name="user_name"><br><br>
                <input type="password" name="password"><br><br>

                <input type="submit" value="Sign Up!"><br><br>

                <a href="login.php">login</a>
            </form>
        </div>
    </body>
</html>