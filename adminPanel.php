<?php
    session_start();

    include("config.php");
    include("functions.php");

    $user_data = check_login($con);
    
    $username = $user_data["user_name"];
?>

<html>
    <head>
        <title>My Website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <style> 
        .table-div { 
            display: none; /* Hide the div by default */ 
            border: 1px solid #ccc; 
            padding: 10px; 
            margin-top: 10px; 
        } 
        table { 
            width: 100%; 
            border-collapse: collapse; 
        } 
        th, td { 
            border: 1px solid #000; 
            padding: 8px; 
            text-align: left; 
        } 
    </style>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top"><br>
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">ADMIN
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" id="home"">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="toggleLink">Users</a>
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
        <h1>This is the index page</h1>
        <div class="table-div" id="myTable"> 
            <table> 
                <thead> 
                    <tr> 
                        <th>Header 1</th> 
                        <th>Header 2</th> 
                        <th>Header 3</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <tr> 
                        <td>Row 1 Col 1</td> 
                        <td>Row 1 Col 2</td> 
                        <td>Row 1 Col 3</td> 
                    </tr> 
                    <tr> 
                        <td>Row 2 Col 1</td> 
                        <td>Row 2 Col 2</td> 
                        <td>Row 2 Col 3</td> 
                    </tr> 
                </tbody> 
            </table> 
        </div> 
        <br>
    </body>

    <script> 
        const toggleLink = document.getElementById('toggleLink'); 
        const myTable = document.getElementById('myTable');
        const hideTable = document.getElementById('home');
    
        toggleLink.addEventListener('click', function(event) { 
            event.preventDefault(); // Prevent the default link behavior 
            if (myTable.style.display === 'none' || myTable.style.display === '') { 
                myTable.style.display = 'block'; // Show the table 
            }
        });
        hideTable.addEventListener('click', function(event) { 
            event.preventDefault(); // Prevent the default link behavior 
            if (myTable.style.display === 'block') { 
                myTable.style.display = 'none'; // Show the table 
            }
        }); 
    </script>
</html>