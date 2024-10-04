<h3 class="text-center text-dark">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
    <?php
        $get_payments = "SELECT * FROM `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);

        if($row_count == 0){
            echo "<h2 class='text-center text-danger mt-5'>No Payments received yet</h2>";
        } else {
            echo "<tr>
            <th>Sl no</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Order Date</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-light text-dark'>";

            $number = 0;
            while($row_data = mysqli_fetch_assoc($result)){
                $payment_id = $row_data['payment_id'];
                $invoice_number = $row_data['invoice_number'];
                $amount = $row_data['amount'];
                $order_date = $row_data['date'];
                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$invoice_number</td>
                    <td>$amount</td>
                    <td>$order_date</td>
                    <td><a href=\"index.php?delete_payment=$payment_id\" class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }
        }
    ?>
    </tbody>
</table>