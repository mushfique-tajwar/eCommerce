<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
        <img src="./Images/Logo.png" alt="" class="Logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php if(isset($_SESSION['user_name'])){
                        echo
                        "<a class='nav-link fw-bold' href='users/profile.php'>User</a>";}
                    else
                        {echo
                        "<a class='nav-link fw-bold' href='./Users/user_login.php'>User</a>";}
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="display.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="me.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <?php if(isset($_SESSION['user_name'])){
                        $items=wishlist_items();
                        echo
                        "<a class='nav-link fw-bold' href='wishlist.php'>Wishlist<sup> $items</sup></a>";}
                    else{echo
                        "<a class='nav-link fw-bold' href='./Users/user_login.php'>Wishlist</a>";}
                    ?>
                </li>
                <li class="nav-item">
                    <?php if(isset($_SESSION['user_name'])){
                        $items=cart_items();
                        echo
                        "<a class='nav-link fw-bold' href='cart.php'>Cart<sup> $items</sup></a>";}
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
        <form class="d-flex " role="search" action="search.php" method="get">
            <input class="form-control me-2 fw-bold" type="search" placeholder="Search for items" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-dark fw-bold" name="search_data_product">
        </form>
    </div>
</nav>