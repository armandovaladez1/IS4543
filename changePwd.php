<?php
include "config.php";
include "functions.php";


    if($_SERVER['REQUEST_METHOD'] == "POST"){ //if something was posted, then enter
        $user_name = $_POST['user_name']; //storing inputed user_name
        $oldpassword = $_POST['Oldpassword']; //storing inputed password
        $newpwd = $_POST['Newpassword']; //stores new password
        $confpass = $_POST['Confpassword']; //this stores another form of the password to make sure the correct password is inputed

        if(!empty ($user_name) && !empty($oldpassword) && !empty($newpwd) && !empty($confpass) && !is_numeric($user_name)){ //if the input fields are not empty, then enter
            if($newpwd === $confpass){
                    $query = "select * from users where user_name = '$user_name' limit 1"; //building the sql query

                    $result = mysqli_query($con, $query); //store the result from the query

                    if($result){ //entering with results
                        if($result && mysqli_num_rows($result)> 0){ //if user query stored in results returns at least 1 user, then enter
                            $user_data = mysqli_fetch_assoc($result); //this fetches all accociated data with the user from DB
                            $encPwd = decData($user_data["password"], 'ENCKEY'); //This sends the 'password field to the decrypt function along with the key
        
                            if($encPwd === $oldpassword){ //if decoded password matches the inputed password, then enter
                                $newpass = encData($newpwd, 'ENCKEY');
                                $update = "UPDATE `users` SET `password` = '$newpass' where user_name = '$user_name'";

                                mysqli_query($con, $update);
                                echo 'UPDATE COMPLETE';
                            }
                        }
                    }
            }else{echo 'Passwords dont match';}
        }else{echo 'Please enter the information';}

    }


?>

<html>
    <head>
        <title>Change your password</title>
    </head>


    <body>
        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Change your Password</div>
                <input type="text" name="user_name" placeholder="Username"><br><br>
                <input type="password" name="Oldpassword" placeholder="Old Password"><br><br>
                <input type="password" name="Newpassword" placeholder="New Password"><br><br>
                <input type="password" name="Confpassword" placeholder="Confirm New Password"><br><br>

                <input type="submit" value="Change Password"><br><br>

                <a href="signup.php">Sign Up Today!</a><br>
                <a href ="login.php">Login</a>
            </form>
        </div>
    </body>
</html>