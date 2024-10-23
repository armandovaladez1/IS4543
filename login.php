<?php
session_start();
    include("config.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        //checks to see ig username and password field is empty and not numeric
        if(!empty ($user_name) && !empty($password) && !is_numeric($user_name)){  //if requirements are true build a query to read from database
            $query = "select * from users where user_name = '$user_name' limit 1"; //building the sql query
            
            $result = mysqli_query($con, $query); //storing sql query into results variable

            if($result){ //entering with results
                if($result && mysqli_num_rows($result)> 0){ //if user query stored in results returns at least 1 user, then enter
                    $user_data = mysqli_fetch_assoc($result); //this fetches all accociated data with the user from DB
                    $encPwd = decData($user_data["password"], 'ENCKEY'); //This sends the 'password field to the decrypt function along with the key

                    if($encPwd === $password){ //if decoded password matches the inputed password, then enter
                        
                        $_SESSION['user_id'] = $user_data['user_id']; //intializing session
                        header("Location: index.php"); //redirecting to index page
                        die;
                    }
                }
            }
            echo '<div class="alert-danger">
                    <strong>Incorrect Login credentials</strong></div>'; //if the login creds are wrong
        }else{
            echo 'Please enter some valid information!'; //if no creds were inputed
        }
    }

?>

<html>
    <head>
        <title>Login</title>
    </head>


    <body>
        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Login</div>
                <input type="text" name="user_name"><br><br>
                <input type="password" name="password"><br><br>

                <input type="submit" value="login"><br><br>

                <a href="signup.php">Sign Up Today!</a>
            </form>
        </div>
    </body>
</html>