<!-- Connect -->
<?php
include('../Includes/connect.php');
include('../Functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        .propic {
            width: 95%;
            height: 95%;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <img src="../Images/Logo.png" alt="" class="Logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <?php if(isset($_SESSION['user_name'])){
                                echo
                                "<a class='nav-link fw-bold' href='profile.php'>User</a>";}
                            else
                                {echo
                                "<a class='nav-link fw-bold' href='./Users/user_login.php'>User</a>";}
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="../display.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="../me.php">Created By</a>
                        </li>
                        <li class="nav-item">
                            <?php if(isset($_SESSION['user_name'])){
                                $items=wishlist_items();
                                echo
                                "<a class='nav-link fw-bold' href='../wishlist.php'>Wishlist<sup> $items</sup></a>";}
                            else{echo
                                "<a class='nav-link fw-bold' href='./Users/user_login.php'>Wishlist</a>";}
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php if(isset($_SESSION['user_name'])){
                                $items=cart_items();
                                echo
                                "<a class='nav-link fw-bold' href='../cart.php'>Cart<sup> $items</sup></a>";}
                            else{echo
                                "<a class='nav-link fw-bold' href='./Users/user_login.php'>Cart</a>";}
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php if(isset($_SESSION['user_name'])){
                                $total = total_cart_price();
                                echo "<span class='nav-link'>$total/- BDT</span>";}
                            ?>
                        </li>
                    </ul>
                </div>
                <form class="d-flex " role="search" action="../search.php" method="get">
                    <input class="form-control me-2 fw-bold" type="search" placeholder="Search for items" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-dark fw-bold" name="search_data_product">
                </form>
            </div>
        </nav>
            
        
        <!-- Middle -->
            <!--  -->
                <div class="row">
                    <div class="col-md-2 p-0">
                        <ul class="navbar-nav bg-secondary text-center">
                            <?php
                                $user_name=$_SESSION['user_name'];
                                $user_image="SELECT * FROM users where user_name='$user_name'";
                                $result_image=mysqli_query($con,$user_image);
                                $user_data=mysqli_fetch_array($result_image);
                                $user_full_name=$user_data['user_full_name'];
                                $user_image=$user_data['user_image'];
                                echo 
                                "<li class='nav-item bg-warning'>
                                    <a class='nav-link active fw-bold' aria-current='page' href='#'><h4 class='fw-bold my-5'>$user_full_name</h4></a>
                                </li>
                                <li class='nav-item text-center p-4'>
                                    <img src='Profile_pictures/$user_image' class='propic rounded' alt=''>
                                </li>";
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light mb-3" aria-current="page" href="profile.php"><h5>Pending orders</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light mb-3" aria-current="page" href="profile.php?edit_account"><h5>Edit your profile</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light mb-3" aria-current="page" href="profile.php?my_orders"><h5>Orders</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light mb-3" aria-current="page" href="user_logout.php"><h5>Logout</h5></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-light mb-5" aria-current="page" href="profile.php?delete_account"><h5>Delete account</h5></a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="col-md-10 text-center">
                        <?php
                            get_user_order();
                            if(isset($_GET['edit_account'])){
                                include('edit_account.php');
                            }
                            if(isset($_GET['my_orders'])){
                                include('user_orders.php');
                            }
                            if(isset($_GET['delete_account'])){
                                include('delete_account.php');
                            }
                        ?>
                    </div>
                </div>
        <!-- Footer -->
    <div class="bg-warning text-center p-3">
        <p class='fw-bold'>Made by <a href="../me.php">Mushfique Tajwar</a></p>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>