<!-- Connect -->
<?php
include('Includes/connect.php');
include('Functions/common_function.php');
if(isset($_SESSION['user_id'])){
    $wishlist_id=$_SESSION['user_id'];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- Navbar -->
            <?php include("./Includes/navbar.php")?>
        <!-- Calling wishlist -->
            <?php
                wishlist();
            ?>
        <!-- Welcome Dialogue -->
            <?php include("./Includes/welcome.php")?>
            <h1 class="text-center fw-bold m-4 p-4">Your wishlist</h1>
        <!-- Table -->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                    <table class="table table-bordered text-center m-4 p-4">
                        <tbody>
                            <!-- php for dynamic data -->
                                <?php
                                    global $con;
                                    if(isset($_SESSION['user_id'])){
                                    $wishlist_id=$_SESSION['user_id'];}
                                    $total_price= 0;
                                    $final_price= 0;
                                    $wishlist_query = "SELECT * FROM wishlist WHERE wishlist_id='$wishlist_id'";
                                    $wishlist_result = mysqli_query($con, $wishlist_query);
                                    $result_count=mysqli_num_rows($wishlist_result);
                                    if($result_count>0){echo "
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Select</th>
                                            </tr>
                                        </thead>";
                                    while ($wishlist_row = mysqli_fetch_assoc($wishlist_result)){
                                        $product_id = $wishlist_row['product_id'];
                                        $select_products="SELECT * FROM products WHERE product_id='$product_id'";
                                        $result_products=mysqli_query($con,$select_products);
                                        while($row_product_price=mysqli_fetch_array($result_products)){
                                            $product_price=array($row_product_price['product_price']);
                                            $price_table=$row_product_price['product_price'];
                                            $product_name=$row_product_price['product_name'];
                                            $product_image=$row_product_price['product_image'];
                                            $product_value=array_sum($product_price);
                                ?>
                                <tr>
                                    <td><?php echo $product_name ?></td>
                                    <td><img src="./Admin_area/Product_Images/<?php echo $product_image ?>" class="cart_img" alt=""></td>
                                    <td><?php echo $price_table ?>/-</td>
                                    <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>"></td>
                                </tr>
                                <?php }
                                        }}
                                else{
                                    echo "<h1 class='text-center my-5 text-danger'>Your wishlist is currently empty
                                    </h1>";
                                }?>
                        </tbody>
                    </table>
                    <div class="d-flex mb-3">
                        <?php
                            if(isset($_SESSION['user_id'])){
                                $cart_id=$_SESSION['user_id'];}
                            $total_price= 0;
                            $wishlist_query = "SELECT * FROM wishlist WHERE wishlist_id='$wishlist_id'";
                            $wishlist_result = mysqli_query($con, $wishlist_query);
                            $result_count=mysqli_num_rows($wishlist_result);
                            if($result_count>0)
                                {
                                    echo "
                                    <input type='submit' value='Continue Shopping' class='bg-warning px-2 m-1 border-0' name='continue_shopping'>
                                    <input type='submit' value='Add to cart' class='bg-warning px-2 m-1 border-0' name='wishlist_to_cart'>
                                    <input type='submit' value='Remove selected items' class='bg-warning px-2 m-1 border-0' name='remove_wishlist'>";
                                }
                            else{
                                echo "<input type='submit' value='Continue Shopping' class='bg-warning px-2 m-1 border-0' name='continue_shopping'>";
                            }
                            if(isset($_POST['continue_shopping'])){
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            </form>
        <!-- Function to remove items -->
            <?php
                function remove_wishlist_item(){
                    global $con;
                
                    if(isset($_POST['remove_wishlist'])){
                        if(isset($_POST['remove_item']) && is_array($_POST['remove_item'])){
                            foreach($_POST['remove_item'] as $remove_id){
                                $delete_query = "DELETE FROM wishlist WHERE product_id=$remove_id";
                                $run_delete = mysqli_query($con, $delete_query);
                                if(!$run_delete){
                                    echo "<script>alert('Failed to remove item with Product ID: $remove_id');</script>";
                                    return;
                                }
                            }
                            echo "<script>window.open('wishlist.php','_self')</script>";
                        }
                    }
                }
                echo remove_wishlist_item();

                function wishlist_to_cart(){
                    global $con;
                    
                    if(isset($_POST['wishlist_to_cart'])){
                        // Check if any items are selected
                        if(isset($_POST['remove_item']) && is_array($_POST['remove_item'])){
                            // Get the wishlist_id from the session
                            if(isset($_SESSION['user_id'])){
                                $wishlist_id = $_SESSION['user_id'];
                            }
                
                            // Loop through each selected product and add it to the cart
                            foreach($_POST['remove_item'] as $remove_id){
                                // Insert into cart table
                                $insert_query = "INSERT INTO cart (product_id, quantity, cart_id) VALUES ($remove_id, 1, $wishlist_id)";
                                $run_insert = mysqli_query($con, $insert_query);
                
                                // Check if the insertion was successful
                                if(!$run_insert){
                                    echo "<script>alert('Failed to add item with Product ID: $remove_id to cart');</script>";
                                    return;
                                }
                
                                // Delete the item from the wishlist after adding it to the cart
                                $delete_query = "DELETE FROM wishlist WHERE product_id=$remove_id";
                                $run_delete = mysqli_query($con, $delete_query);
                
                                // Check if the deletion was successful
                                if(!$run_delete){
                                    echo "<script>alert('Failed to remove item with Product ID: $remove_id from wishlist');</script>";
                                    return;
                                }
                            }
                
                            // After processing all items, reload the page
                            echo "<script>window.open('wishlist.php','_self')</script>";
                        }
                    }
                }
                
                // Call the function to process form submission
                echo wishlist_to_cart();

            ?>
        <!-- Footer -->
            <?php include("./Includes/footer.php")?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>