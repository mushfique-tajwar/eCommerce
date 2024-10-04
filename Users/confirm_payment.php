<?php
    include('../Includes/connect.php');
    include('../Functions/common_function.php');
    if(isset($_GET['order_id'])){
        $order_id=$_GET['order_id'];
        echo $order_id;
        $select_data="SELECT * FROM orders WHERE order_id=$order_id";
        $result=mysqli_query($con,$select_data);
        $row_fetch=mysqli_fetch_assoc($result);
        $invoice_no=$row_fetch['invoice'];
        $amount_due=$row_fetch['amount'];
    }
    if(isset($_POST['confirm_payment'])){
        $payment_mode=$_POST['payment_mode'];
        $insert_query="INSERT INTO user_payments (order_id,invoice_number,amount,payment_mode) VALUES ($order_id,$invoice_no,$amount_due,'$payment_mode')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<h3 class='text-center text-light'>Payment success</h3>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
        $update_orders="UPDATE orders SET order_status='Confirmed' WHERE order_id=$order_id";
        $result_order=mysqli_query($con,$update_orders);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class='bg-dark'>
    <div class="container my-5">
        <h1 class='text-center text-light p-3 fw-bold'>Confirm Payment</h1>
        <form action="" method='post'>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <h3 class='text-light p-3'>Invoice - <?php echo $invoice_no ?></h3>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <h3 class='text-light p-3'>Amount - <?php echo $amount_due ?></h3>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class='form-select w-50 m-auto'>
                    <option value="Cash">Cash on Delivery</option>
                    <option value="Bkash">BKash</option>
                    <option value="Card">Card</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class='bg-warning py-2 px-3 border-0 rounded' value='Confirm' name='confirm_payment'>
            </div>
        </form>
    </div>
</body>
</html>