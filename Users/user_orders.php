<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $user_name=$_SESSION['user_name'];
    $get_user="SELECT * FROM users WHERE user_name='$user_name'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];

    ?>


    <h3 class="text-success m-4 p-4">All my Orders</h3>
    <table class="table table-bordered mt-5 p-5">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice</th>
                <th>Date</th>
                <th>Status</th>
                <th>Confirmation</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $get_order_details="SELECT * FROM orders WHERE user_id='$user_id'";
            $result_orders=mysqli_query($con,$get_order_details);
            $number=1;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_data['order_id'];
                $amount=$row_data['amount'];
                $total=$row_data['total_products'];
                $invoice=$row_data['invoice'];
                $order_status=$row_data['order_status'];
                $order_date=$row_data['order_date'];
                
                echo
                "<tr>
                    <td>$number</td>
                    <td>$amount</td>
                    <td>$total</td>
                    <td>$invoice</td>
                    <td>$order_date</td>
                    <td>$order_status</td>";
                    ?>
                    <?php
                    if($order_status=='Confirmed'){
                        echo "<td>Paid</td>";
                    }
                    else{
                        echo
                    "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
                </tr>";}
                $number++;
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>