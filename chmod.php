<?php

include("config.php");

//var_dump($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_name = htmlspecialchars($_POST["user_name"]);
    $user_type = htmlspecialchars($_POST["userType"]);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['user_name']; //storing inputed user_name
        $user_type = $_POST['userType']; //storing the permissions selected

        if(!empty ($user_name)){ //if the input fields are not empty, then enter
            $query = "select * from users where user_name = '$user_name' limit 1"; //building the sql query

            $result = mysqli_query($con, $query);//store the result from the query

            if($result){ //entering with results
                $user_data = mysqli_fetch_assoc($result); //this fetches all accociated data with the user from DB
                $update = "UPDATE `users` SET `user_type` = '$user_type' where user_name = '$user_name'";
                $currentPerms = $user_data['user_type'];

                if($user_type != $currentPerms){
                    mysqli_query($con, $update);
                    echo 'Update complete!';
                }else{echo 'User already has these permissions!';}
            }
        }else{echo 'Username was not entered';}

    }
}

header('Location: adminPanel.php');
die();
