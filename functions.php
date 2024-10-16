<?php

function check_login($con){
    
    #this will check to see if the user_id is set as the session, and-
    #will check to see if the user is logged in
    if(isset($_SESSION['user_id'])){
        #this will store the user_id that is set as the session
        $id = $_SESSION['user_id'];
        #we then build the query to look and see if the user_id exist-
        # in our database.
        $query = "select * from where user_id = '$id' limit 1";

        #we then send the query to the database using the mysqli function
        $result = mysqli_query($con,$query);
        #this checks to see if the results exist in the table of our database
        if($result && mysqli_num_rows($result) > 0){
            #we then store all of the accosiated data of that user-
            # this includes the user_name, password and user_id
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login if user id is not found, meaning no user is logged in
    header("Location: login.php");
    die;
}