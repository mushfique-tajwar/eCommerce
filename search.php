<!-- Connect -->
<?php
include('Includes/connect.php');
include('Functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid p-0">
        <!-- Navbar -->
            <?php include("./Includes/navbar.php")?>
        <!-- Calling cart and wishlist -->
            <?php
                cart();
                wishlist();
            ?>
        <!-- Welcome Dialogue -->
            <?php include("./Includes/welcome.php")?>
        <!-- Products and Categories -->
            <div class="row px-1">
                <!-- Categories -->
                    <div class="col-md-2 bg-secondary p-0">
                            <ul class="navbar-nav me-auto text-center">
                                <li class="nav-itme bg-warning">
                                    <a class="nav-link" ><h4>Categories</h4></a>
                                </li>
                                <?php
                                    getcategories();
                                ?>
                            </ul>
                        </div>
                <!-- Products -->
                    <div class="col md-10">
                        <div class="bg-light p-2 m-2">
                            <h3 class="text-center fw-bold">
                                eCommerce Project
                            </h3>
                            <p class="text-center">
                                Browser through all our products
                            </p>
                        </div>
                        <div class="row">
                            <!-- Calling products -->
                                <?php
                                    search_product();
                                    getuniquecategories();
                                ?>
                        </div>
                    </div>
            </div>
        <!-- Footer -->
        <?php include("./Includes/footer.php")?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>