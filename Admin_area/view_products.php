<h3 class="text-center text-dark fw-bold">
  All products
</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-warning">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Product Image</th>
      <th>Price</th>
      <th>Sold Units</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
<tbody class="bg-secondary text-light">
  <?php
    $product_get= "SELECT * FROM products ORDER BY product_name ASC";
    $result=mysqli_query($con,$product_get);
    $num=0;
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['product_id'];
      $title=$row['product_name'];
      $product_Image=$row['product_image'];
      $price=$row['product_price'];
      $status=$row['status'];
      $num++;
  ?>
  <tr class='text-center'>
    <td>
      <?php echo $num;?>
    </td>
    <td>
      <?php echo $title;?>
    </td>
    <td>
      <img src='./Product_Images/<?php echo $product_Image;?>' class='product_img'/>
    </td>
    <td>
      <?php echo $price;?>/-
    </td>
    <td>
      <?php
        $count_get="SELECT * FROM pending WHERE product_id=$id";
        $result_count=mysqli_query($con,$count_get);
        $rows_count=mysqli_num_rows($result_count);
        echo $rows_count;
        ?>
    </td>
    <td>
      <a href='index.php?edit_products=<?php echo $id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a>
    </td>
    <td>
      <a href='index.php?delete_product=<?php echo $id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a>
    </td>
  </tr>
<?php
  }
?>
</tbody>
</table>