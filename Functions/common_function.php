<?php
    // Getting products
        function getproducts(){
            global $con;
            // condition to check isset or not
            if(!isset($_GET['category'])){
                $select_query="SELECT * FROM products ORDER BY rand() LIMIT 0,12";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $product_description=$row['product_description'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        echo "<div class='col-md-3 mb-4'>
                            <div class='card card-fixed'>
                                <img src='./Admin_area/Product_Images/$product_image' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title fw-bold'>$product_name</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text fw-bold'>Price - $product_price/- BDT</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-2 fw-bold'>Add to cart</a>
                                    <a href='index.php?add_to_wishlist=$product_id' class='btn btn-primary mb-2 fw-bold'>Add to wishlist</a>
                                </div>
                            </div>
                        </div>";
                }
        }  
        }

    // Getting specific categories
        function getuniquecategories(){
            global $con;
            // condition to check isset or not
            if(isset($_GET['category'])){
                $category_id=$_GET['category'];
                $select_query="SELECT * FROM products WHERE category_id=$category_id";
                $result_query=mysqli_query($con,$select_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No Stock for this category</h2>";
                }
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $product_description=$row['product_description'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        echo "<div class='col-md-3 mb-2'>
                            <div class='card'>
                                <img src='./Admin_area/Product_Images/$product_image' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_name</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price - $product_price/- BDT</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn fw-bold btn-primary mb-2'>Add to cart</a>
                                    <a href='#' class='btn fw-bold btn-primary mb-2'>Add to wishlist</a>
                                </div>
                            </div>
                        </div>";
                }
        }  
        }

    // Getting categories
        function getcategories(){
            global $con;
                $select_categories="SELECT * FROM categories ORDER BY category_name asc";
                $result_categories=mysqli_query($con,$select_categories);
                while($row_data=mysqli_fetch_assoc($result_categories)){
                    $category_name=$row_data['category_name'];
                    $category_id=$row_data['category_id'];
                    echo " <li class='nav-item'><a href='index.php?category=$category_id' class='nav-link' style='color:#FFFFFF;'>$category_name</a></li>";
                }
        }

    // Searching products
        function search_product(){
            global $con;
            if(isset($_GET['search_data_product'])){
                $search_data=$_GET['search_data'];
                $search_query="SELECT * FROM products WHERE product_keyword LIKE '%$search_data%'";
                $result_query=mysqli_query($con,$search_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No Products match with your search</h2>";
                }
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $product_description=$row['product_description'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        echo "<div class='col-md-3 mb-2'>
                            <div class='card'>
                                <img src='./Admin_area/Product_Images/$product_image' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title fw-bold'>$product_name</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text fw-bold'>Price - $product_price/- BDT</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-2'>Add to cart</a>
                                    <a href='#' class='btn btn-primary mb-2'>Add to wishlist</a>
                                </div>
                            </div>
                        </div>";
                }
            }

        }

    // Get all Products
        function get_all_products(){
            global $con;
            // condition to check isset or not
            if(!isset($_GET['category'])){
                $select_query="SELECT * FROM products ORDER BY rand()";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $product_description=$row['product_description'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        echo "<div class='col-md-3 mb-4'>
                            <div class='card card-fixed'>
                                <img src='./Admin_area/Product_Images/$product_image' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title fw-bold'>$product_name</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text fw-bold'>Price - $product_price/- BDT</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mb-2 fw-bold'>Add to cart</a>
                                    <a href='#' class='btn btn-primary mb-2 fw-bold'>Add to wishlist</a>
                                </div>
                            </div>
                        </div>";
                }
        }
        }
    
    
    // Getting IP
        function getIPAddress() {  
            //whether ip is from the share internet  
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                        $ip = $_SERVER['HTTP_CLIENT_IP'];  
                }  
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            }  
        //whether ip is from the remote address  
            else{  
                    $ip = $_SERVER['REMOTE_ADDR'];  
            }  
            return $ip;  
        }
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip; 
    // Cart
        function cart() {
            if(isset($_SESSION['user_id'])) {
                if(isset($_GET['add_to_cart'])) {
                    global $con;
                    $cart_id = $_SESSION['user_id'];
                    $get_product_id = $_GET['add_to_cart'];
                    // Check if the product is already in the cart
                    $select_query = "SELECT * FROM cart WHERE cart_id='$cart_id' AND product_id=$get_product_id";
                    $result_query = mysqli_query($con, $select_query);
                    $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows > 0) {
                        // Update quantity if already in cart
                        $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE cart_id=$cart_id AND product_id=$get_product_id";
                        $result_update = mysqli_query($con, $update_query);
                    } else {
                        // Insert product into cart if not already added
                        $insert_query = "INSERT INTO cart (product_id, quantity, cart_id) VALUES ($get_product_id, 1, $cart_id)";
                        $result_query = mysqli_query($con, $insert_query);
                    }

                    // Check if the item is in the wishlist and remove it if exists
                    $wishlist_check_query = "SELECT * FROM wishlist WHERE wishlist_id='$cart_id' AND product_id=$get_product_id";
                    $wishlist_check_result = mysqli_query($con, $wishlist_check_query);
                    if(mysqli_num_rows($wishlist_check_result) > 0) {
                        // If the product is found in the wishlist, remove it
                        $delete_wishlist_query = "DELETE FROM wishlist WHERE wishlist_id='$cart_id' AND product_id=$get_product_id";
                        $run_delete_wishlist = mysqli_query($con, $delete_wishlist_query);
                    }

                    echo "<script>alert('Item has been added to cart')</script>";
                    echo "<script>window.open('index.php', '_self')</script>";
                }
            } else {
                if(isset($_GET['add_to_cart'])) {
                    echo "<script>alert('Please login first.')</script>";
                    echo "<script>window.open('Users/user_login.php','_self')</script>";
                }
            }
        }


    // Get total items in cart
        function cart_items(){
            if(isset($_GET['add_to_cart'])){
                global $con;
                if(isset($_SESSION['user_id'])){
                    $cart_id=$_SESSION['user_id'];}
                $select_query="SELECT SUM(quantity) AS total_quantity FROM cart WHERE cart_id=$cart_id";
                $result_query=mysqli_query($con,$select_query);
                $row = mysqli_fetch_assoc($result_query);
                $count_cart_items=$row['total_quantity'];
                }
            else{
                global $con;
                if(isset($_SESSION['user_id'])){
                    $cart_id=$_SESSION['user_id'];}
                $select_query="SELECT SUM(quantity) AS total_quantity FROM cart WHERE cart_id=$cart_id";
                $result_query=mysqli_query($con,$select_query);
                $row = mysqli_fetch_assoc($result_query);
                $count_cart_items=$row['total_quantity'];
                }
            return $count_cart_items;
            }
        
    // Getting total cart price
        function total_cart_price() {
            global $con;
            if(isset($_SESSION['user_id'])){
                $cart_id=$_SESSION['user_id'];}
            $total_price= 0;
            $cart_query = "SELECT product_id, quantity FROM cart WHERE cart_id='$cart_id'";
            $cart_result = mysqli_query($con, $cart_query);
            if (!$cart_result) {
                echo "Error fetching cart items: " . mysqli_error($con);
                return;
            }
            while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                $product_id = $cart_row['product_id'];
                $quantity = $cart_row['quantity'];
                $product_query = "SELECT product_price FROM products WHERE product_id='$product_id'";
                $product_result = mysqli_query($con, $product_query);
                if (!$product_result) {
                    echo "Error fetching product price: " . mysqli_error($con);
                    return;
                }
                $product_row = mysqli_fetch_assoc($product_result);
                if ($product_row) {
                    $product_price = $product_row['product_price'];
                    $total_price += $product_price * $quantity;
                } else {
                    echo "Product with ID $product_id not found.";
                }
            }
            // Output the total price
            return $total_price;
        }
        
    // Get user orders
        function get_user_order(){
            global $con;
            $user_name=$_SESSION['user_name'];
            $get_details="SELECT * FROM users WHERE user_name='$user_name'";
            $result_query=mysqli_query($con,$get_details);
            while($row_query=mysqli_fetch_array($result_query)){
                $user_id=$row_query['user_id'];
                if(!isset($_GET['edit_account'])){
                    if(!isset($_GET['my_orders'])){
                        if(!isset($_GET['delete_account'])){
                            $get_orders="SELECT * FROM orders WHERE user_id='$user_id' AND order_status='Pending'";
                            $result_orders_query=mysqli_query($con,$get_orders);
                            $row_count=mysqli_num_rows($result_orders_query);
                            if($row_count>0){
                                echo "<h4 class='text-center text-danger p-5 m-5 fw-bold'>You have <span>$row_count</span> pending orders</h4>
                                <p class='text-center'><a href='profile.php?my_orders' class='text-center text-dark p-5'>Order Details</a></p>";
                            }
                            else{
                                echo "<h4 class='text-center text-danger p-5 m-5 fw-bold'>You have no pending orders</h4>
                                <p class='text-center'><a href='../index.php' class='text-center text-dark p-5'>Keep browsing</a></p>";
                            }
                        }
                    }
                }
            }
        }

    // Get user id
        if(isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'];}
    
    // Wishlist
        function wishlist() {
            if(isset($_SESSION['user_id'])) {
                if(isset($_GET['add_to_wishlist'])) {
                    global $con;
                    $wishlist_id = $_SESSION['user_id'];
                    $get_product_id = $_GET['add_to_wishlist'];

                    // Check if the product is already in the cart
                    $cart_check_query = "SELECT * FROM cart WHERE cart_id='$wishlist_id' AND product_id=$get_product_id";
                    $cart_check_result = mysqli_query($con, $cart_check_query);
                    $num_of_rows_cart = mysqli_num_rows($cart_check_result);

                    if($num_of_rows_cart > 0) {
                        // If the product is already in the cart, do not allow adding to wishlist
                        echo "<script>alert('Item is already in the cart. Cannot add to wishlist.')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    } else {
                        // Check if the product is already in the wishlist
                        $select_query = "SELECT * FROM wishlist WHERE wishlist_id='$wishlist_id' AND product_id=$get_product_id";
                        $result_query = mysqli_query($con, $select_query);
                        $num_of_rows = mysqli_num_rows($result_query);

                        if($num_of_rows > 0) {
                            // If the product is already in the wishlist, show a message
                            echo "<script>alert('Item is already in the wishlist')</script>";
                            echo "<script>window.open('index.php','_self')</script>";
                        } else {
                            // Insert product into wishlist if not already added
                            $insert_query = "INSERT INTO wishlist (product_id, wishlist_id) VALUES ($get_product_id, $wishlist_id)";
                            $result_query = mysqli_query($con, $insert_query);
                            echo "<script>alert('Item has been added to wishlist')</script>";
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                    }
                }
            } else {
                if(isset($_GET['add_to_wishlist'])) {
                    echo "<script>alert('Please login first.')</script>";
                    echo "<script>window.open('Users/user_login.php','_self')</script>";
                }
            }
        }

    // Get total items in wishlist
        function wishlist_items(){
            if(isset($_GET['add_to_wishlist'])){
                global $con;
                if(isset($_SESSION['user_id'])){
                    $wishlist_id=$_SESSION['user_id'];}
                $select_query="SELECT COUNT(product_id) AS total_quantity FROM wishlist WHERE wishlist_id=$wishlist_id";
                $result_query=mysqli_query($con,$select_query);
                $row = mysqli_fetch_assoc($result_query);
                $count_wishlist_items=$row['total_quantity'];
                }
            else{
                global $con;
                if(isset($_SESSION['user_id'])){
                    $wishlist_id=$_SESSION['user_id'];}
                $select_query="SELECT COUNT(product_id) AS total_quantity FROM wishlist WHERE wishlist_id=$wishlist_id";
                $result_query=mysqli_query($con,$select_query);
                $row = mysqli_fetch_assoc($result_query);
                $count_wishlist_items=$row['total_quantity'];
                }
            return $count_wishlist_items;
            }
?>