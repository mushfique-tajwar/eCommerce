<?php
    if(isset($_GET['delete_payment'])){
        $delete_id = intval($_GET['delete_payment']);
        $delete_payment = "DELETE FROM user_payments WHERE payment_id = $delete_id";
        $result_payment = mysqli_query($con, $delete_payment);

        if($result_payment){
            echo "<script>alert('Deletion successful')</script>";
            echo "<script>window.open('index.php?all_payments.php','_self')</script>";
        }
    }
?>