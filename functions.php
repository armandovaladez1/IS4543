<?php

//This fucntion checks to see if a session is active so we know a user is logged in
function check_login($con){
    //checking if session value exist
    if(isset($_SESSION['user_id'])){
        //Storing user id from session
        $id = $_SESSION['user_id'];
        //creating a query search from user id number to validate in sql db
        $query = "select * from users where user_id = '$id' limit 1";

        //Checking with the database if user_id exist
        $result = mysqli_query($con,$query);
        //if the result of the querey is greater than 0, meaning it found more than 0 users
        if($result && mysqli_num_rows($result)> 0){
            //assigning the found user from the db to a variable user_data
            $user_data = mysqli_fetch_assoc($result);
            //reutring the user_data
            return $user_data;
        }
    }else{

    //if session doesnt exist we redirect to login page
    header("Location: login.php");
    die;
    }
}

//This function creates a random length for the user_id when creating an account
function random_num($length){

    $text = "";
    //Checking to see if length is less than 5
    if($length < 5){
        //sets length to 5 so its never below 5
        $length = 5;
    }
    // variable that holds a random number between 5 and max length
    $len = rand(4,$length);
    //iterates through the length amount
    for ($i = 0; $i < $len; $i++){
        $text .= rand(0,9);
    }
    return $text;
}

//This function will strip unwanted characters from the fields
function stripChars($srt){

}

function encData($str, $key){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($str, 'aes-256-cbc', $key, 0, $iv);

    return base64_encode($iv . $encrypted);
}

function decData($str, $key){
    $str = base64_decode($str);
    $ivSize = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($str,0, $ivSize);
    $encrypted = substr($str, $ivSize);
    
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}

function passVerif($str){
    $length = mb_strlen($str, 'UTF-8'); //stores length of string
    $pattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).*$/'; //store regex that checks for 1 Caps, 1 Num, and 1 spec char

    if ($length >= 12 && preg_match($pattern, $str) == 1) { //if length is greater than 12 chars and pass matches regex, then enter
        return $str; //return the str unchanged
    }
}