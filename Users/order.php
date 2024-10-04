<?php
    session_start();
    include('../Includes/connect.php');
    include('../Functions/common_function.php');
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    $get_ip=getIPAddress();
    $total_price=0;
    $cart_query_price="SELECT * FROM cart WHERE cart_id='$user_id'";
    $result_cart_price=mysqli_query($con,$cart_query_price);
    $invoice_number=mt_rand();
    $status='Pending';
    $count_products=mysqli_num_rows($result_cart_price);
    while($row_price=mysqli_fetch_array($result_cart_price)){
        $product_id=$row_price['product_id'];
        $select_product="SELECT * FROM products WHERE product_id=$product_id";
        $price=mysqli_query($con,$select_product);
        while($row_product_price=mysqli_fetch_array($price)){
            $product_price=array($row_product_price['product_price']);
            $order_price=array_sum($product_price);
            $total_price+=$order_price;
        }
    }
    $get_cart="SELECT * FROM cart";
    $run_cart=mysqli_query($con,$get_cart);
    $get_item_quantity=mysqli_fetch_array($run_cart);
    $quantity=$get_item_quantity['quantity'];
    $subtotal=$total_price*$quantity;
    $insert_orders="INSERT INTO orders (user_id,amount,invoice,total_products,order_date,order_status) VALUES ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
    $result_query=mysqli_query($con,$insert_orders);
    if($result_query){
        echo "<script>alert('Orders are submitted successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }

    // orders pending
    $insert_pending_orders="INSERT INTO pending (user_id,invoice,product_id,quantity,order_status) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
    $result_pending=mysqli_query($con,$insert_pending_orders);

    // del car it
    $empty_cart="DELETE FROM cart WHERE cart_id=$user_id";
    $result_delete=mysqli_query($con,$empty_cart);
?>