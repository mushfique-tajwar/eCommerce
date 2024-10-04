<h3 class="text-center text-dark">
    All Orders
</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
    <?php
        $get_orders="SELECT * FROM `orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);


        if($row_count==0){
            echo "<h2 class='text-center text-danger mt-5'>No Orders has been placed yet</h2>";
        }
        else
        {echo "<tr>
        <th>Sl no</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-light text-dark'>";
            $number = 0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount=$row_data['amount'];
                $invoice=$row_data['invoice'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;
                echo "  <tr>
                    <td>$number</td>
                    <td>$amount</td>
                    <td>$invoice</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td><a href=\"index.php?delete_order=$order_id\" class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>";
            }
        }
    ?>



    </tbody>
</table>