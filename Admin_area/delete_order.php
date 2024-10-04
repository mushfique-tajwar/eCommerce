<?php
    if(isset($_GET['delete_order'])){
        $delete_id = intval($_GET['delete_order']);
        $delete_order = "DELETE FROM orders WHERE order_id = $delete_id";
        $result_order = mysqli_query($con, $delete_order);
        if($result_order){
            echo "<script>alert('Deletion successful')</script>";
            echo "<script>window.open('index.php?all_orders.php','_self')</script>";
        }
    }
?>