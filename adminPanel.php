<?php
    session_start();

    include("config.php");
    include("functions.php");

    $user_data = check_login($con);
    
    $username = $user_data["user_name"];

    $query = "select * from users";
    $result = mysqli_query($con,$query);
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
        <div class="table-div" id="myTable">
        <h1 class="text-center">Users</h1>
            <div class="row mt-5">
                <div class="col">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <table class="table text-center">
                            <tr class="thead-dark text-white">
                                <td>User ID</td>
                                <td>User Name</td>
                                <td>Password</td>
                                <td>User Permissions</td>
                            </tr>
                            <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>
                                <td><?php echo $row['user_id'] ?></td>
                                <td><?php echo $row['user_name'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td><?php echo $row['user_type'] ?></td>
                            </tr>
                            <?php
                                }

                            ?>
                        </table>
                    </div>
                </div>
                <label>Change User permissions:</label>
                <div>
                    <form action="chmod.php" method="post">
                        <input type="text" name="user_name" placeholder="Username">
                        <select name="userType" id="userType">
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-success">Save Changes!</button>
                    </form>
                </div>
            </div>

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