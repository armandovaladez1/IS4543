<?php
    session_start();

    include("config.php");
    include("functions.php");

    $user_data = check_login($con);
    
    $username = $user_data["user_name"];
    $encPwd = decData($user_data["password"], 'ENCKEY');
?>

<html>
    <head>
        <title>My Website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"><br>
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">USER
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Option2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Option3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Option4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Option5</a>
                    </li>
                </ul>
                <ul class="navbar-nav" style="padding-right:70px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo $username?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav><br><br><br>
        <h1>This is the index page<br>Current password:<?echo $encPwd?></h1>

        <br>
    </body>

    <!-- Tab Panes -->
     <div class="tab-content">
        <div class="tab-pane container active" id="home">

        </div>
        <div class="tab-pane container fade" id="menu1">
            
        </div>
        <div class="tab-pane container fade" id="menu2">
            
        </div>
     </div>
</html>