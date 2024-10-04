<!--connect file -->
<?php
include('../Includes/connect.php');
include('../Functions/common_function.php');
@session_start();
if (!isset($_SESSION['admin_username'])) {
    // Redirect to the login page if admin is not logged in
    header('Location: ../Admin_area/admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
    .admin_image{
        width: 100px;
        object-fit: contain;
    }
    .footer{
        position: absolute;
        bottom: 0;
    }
    .product_img{
        width:100px;
        object-fit:contain;

    }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- Top -->
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="container-fluid">
                    <img src="../images/Logo.png" alt="" class="Logo">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                        <?php  
                                if(isset($_SESSION['admin_username'])){
                                    echo
                                    "<li class='nav-item'><a class='nav-link text-light fw-bold text-dark'>Welcome <span class='fw-bold'>".$_SESSION['admin_username']."</span></a></li>";
                                }
                        ?>
                        </ul>
                    </nav>
                </div>  
            </nav>
        <!-- Manage Details -->
            <div class="bg-light">
                <h1 class="text-center fw-bold p-3">Manage Details</h1>
            </div>
        <!-- Admin and Buttons -->
            <div class="row p-1">
                <div class="md-12 bg-secondary p-1 d-flex align-items-center">
                    <div class="button text-center p-3">
                        <button class="my-3 rounded">
                            <a href="Insert_Product.php" class="nav-link text-dark bg-warning p-3 fw-bold">Insert Products</a>
                        </button>
                        <button class="my-3 rounded">
                            <a href="index.php?view_products" class="nav-link text-dark bg-warning p-3 fw-bold">View Products</a>
                        </button>
                        <button class="my-3 rounded">
                            <a href="index.php?Insert_categories" class="nav-link text-dark bg-warning p-3 fw-bold">Insert Categories</a>
                        </button>
                        <button class="my-3 rounded">
                            <a href="index.php?view_categories" class="nav-link text-dark bg-warning p-3 fw-bold">View Categories</a>
                        </button>
                        <button class="my-3 rounded">
                            <a href="index.php?all_orders" class="nav-link text-dark bg-warning p-3 fw-bold">All Orders</a>
                        </button>
                        <button class="my-3 rounded">
                            <a href="index.php?all_payments" class="nav-link text-dark bg-warning p-3 fw-bold">All Payments</a>
                        </button>
                        <button class="my-3 rounded">
                            <a href="index.php?all_users" class="nav-link text-dark bg-warning p-3 fw-bold">All Users</a>
                        </button>
                        <button class="my-3 rounded">
                            <a href="admin_logout.php" class="nav-link text-dark bg-warning p-3 fw-bold">Logout</a>
                        </button>
                    </div>
                </div>
            </div>
        <!-- Get -->
            <div class="class-container my-3 mx-5">
                <?php
                if(isset($_GET['Insert_categories'])){
                        include('Insert_categories.php');
                }             
                if(isset($_GET['view_products'])){
                        include('view_products.php');        
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');        
                }
                if(isset($_GET['delete_product'])){
                    include('delete_product.php');        
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');        
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');        
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');        
                }
                if(isset($_GET['all_orders'])){
                    include('all_orders.php');        
                }
                if(isset($_GET['delete_order'])){
                    include('delete_order.php');        
                }
                if(isset($_GET['all_payments'])){
                    include('all_payments.php');        
                }
                if(isset($_GET['delete_payment'])){
                    include('delete_payment.php');        
                }
                if(isset($_GET['all_users'])){
                    include('all_users.php');        
                }
                if(isset($_GET['delete_user'])){
                    include('delete_user.php');        
                }
                ?>
            </div>
            <!--footer-->
            <?php include("../Includes/footer.php")  ?>
    </div>

<!-- bootstrap css link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>