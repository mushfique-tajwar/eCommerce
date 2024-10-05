<?php
    include('../Includes/connect.php');
    include('../Functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid fw-bold">
            <img src="./Images/Logo.png" alt="" class="Logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display.php">Products</a>
                    </li>
                        <a class="nav-link" href="../me.php">Created By</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex " role="search" action="search.php" method="get">
                <input class="form-control me-2 fw-bold" type="search" placeholder="Search for items" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-dark fw-bold" name="search_data_product">
            </form>
        </div>
    </nav>
    <div class="container-fluid">
        <h2 class="text-center m-5 fw-bold">Sign up as a new user</h2>
        <div class="row m-4 d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-16">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_name" class="form-label">Full Name</label>
                        <input type="text" id="user_full_name" class="form-control" placeholder="Enter your full name" autocomplete="off" require="required" name="user_full_name">
                    </div>
                    <!-- Username -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Create a username" autocomplete="off" require="required" name="user_name">
                    </div>
                    <!-- Email -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" require="required" name="user_email">
                    </div>
                    <!-- Phone -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_phone" class="form-label">Phone</label>
                        <input type="text" id="user_phone" class="form-control" placeholder="Enter your phone" autocomplete="off" require="required" name="user_phone">
                    </div>
                    <!-- Image -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" id="user_image" class="form-control" require="required" name="user_image">
                    </div>
                    <!-- Address -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" require="required" name="user_address">
                    </div>
                    <!-- Password -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Create a password" autocomplete="off" require="required" name="user_password">
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confuser_password" class="form-control" placeholder="Confirm password" autocomplete="off" require="required" name="confuser_password">
                    </div>
                    <div class="text-center m-4 p-2">
                        <input type="submit" value="Sign up" class="bg-warning fw-bold p-3 border-0 rounded" name="register">
                        <p class="small fw-bold m-4 p-1">Already have an account ? <a href="user_login.php"> Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="bg-warning text-center p-3">
        <p class='fw-bold'>Made by <a href="../me.php">Mushfique Tajwar</a></p>
    </div>
</body>
</html>

<!-- php -->
    <?php
        if(isset($_POST['register'])){
            $user_full_name=$_POST['user_full_name'];
            $user_name=$_POST['user_name'];
            $user_email=$_POST['user_email'];
            $user_phone=$_POST['user_phone'];
            $user_image=$_FILES['user_image']['name'];
            $user_temp_image=$_FILES['user_image']['tmp_name'];
            $user_address=$_POST['user_address'];
            $user_password=$_POST['user_password'];
            $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
            $user_password_conf=$_POST['confuser_password'];
            $user_ip=getIPAddress();
            
            // select query
            
            $select_query="SELECT * FROM users WHERE user_name='$user_name' OR user_email='$user_email' OR user_phone='$user_phone'";
            $result=mysqli_query($con,$select_query);
            $rows_count=mysqli_num_rows($result);
            if($rows_count>0){
                echo "<script>alert('Username or email or phone already exists')</script>";
            }
            else if($user_password!=$user_password_conf){
                echo "<script>alert('Passwords do not match')</script>";
            }
            else
            {move_uploaded_file($user_temp_image,"./Profile_pictures/$user_image");
            $insert_query="INSERT INTO users (user_full_name,user_name,user_email,user_phone,user_image,user_address,user_ip,user_password) VALUES ('$user_full_name','$user_name','$user_email','$user_phone','$user_image','$user_address','$user_ip','$hash_password')";
            $sql_execute=mysqli_query($con,$insert_query);
            if($sql_execute){
                echo "<script>alert('Account created successfully!! Proceed to login page.')</script>";
            }
            else{
                die(mysqli_error($con));
            }}
        }
    ?>