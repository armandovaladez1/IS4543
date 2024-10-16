<?php
session_start();

    include("config.php");
    include("functions.php");

    

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