<?php
    include('../Includes/connect.php');
    include('../Functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <img src="./Images/Logo.png" alt="" class="Logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="../display.php">Products</a>
                    </li>
                        <a class="nav-link fw-bold" href="../me.php">Created By</a>
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
        <h2 class="text-center m-5 fw-bold">Log in to your account</h2>
        <div class="row d-flex align-items-center justify-content-center m-4">
            <div class="col-lg-12 col-xl-16">
                <form action="" method="post">
                    <!-- Username -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="name" id="user_name" class="form-control" placeholder="Enter your username" autocomplete="off" required name="user_name">
                    </div>
                    <!-- Password -->
                    <div class="form-outline mb-4 m-auto">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter you password" autocomplete="off" required name="user_password">
                    </div>
    <?php
        if(isset($_POST['sign_in'])){
            $user_name=$_POST['user_name'];
            $user_password=$_POST['user_password'];
            $select_query="SELECT * FROM users WHERE user_name='$user_name'";
            $result=mysqli_query($con,$select_query);
            $row_count=mysqli_num_rows($result);
            $row_data=mysqli_fetch_assoc($result);
            $user_ip=getIPAddress();
            // cart item
            $select_query_cart="SELECT * FROM cart WHERE cart_id='$user_ip'";
            $select_cart=mysqli_query($con,$select_query_cart);
            $row_count_cart=mysqli_num_rows($select_cart);
            if($row_count>0){
                    if(password_verify($user_password,$row_data['user_password'])){
                        if($row_count==1 and $row_count_cart==0){
                            $_SESSION['user_name']=$user_name;
                            echo "<script>alert('Succesfully Logged In')</script>";
                            $_SESSION['user_name'] = $user_name;
                            $_SESSION['user_id'] = $row_data['user_id'];
                            header("Location: ../index.php");
                        }
                        else{
                            $_SESSION['user_name']=$user_name;
                            echo "<script>alert('Succesfully Logged In')</script>";
                            $_SESSION['user_name'] = $user_name;
                            $_SESSION['user_id'] = $row_data['user_id'];
                            // echo "<script>window.open('payment.php')</script>";
                            header("Location: ../index.php");
                        }
                    }
                    else{
                        echo "<div class='text-danger fw-bold text-center'>
                                <p>Invalid Credentials</p>
                            </div>";
                    }
            }
            else{
                echo "<div class='text-danger fw-bold text-center'>
                        <p>Invalid Credentials</p>
                    </div>";
            }
        }
    ?>

                    <div class="text-center m-4 p-2">
                        <input type="submit" value="Sign in" class="bg-warning fw-bold p-3 border-0 rounded" name="sign_in">
                        <p class="small fw-bold m-4 p-1">Don't have an account ? <a href="user_sign_up.php"> Sign Up here</a></p>
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

