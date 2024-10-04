<h3 class="text-center text-dark">
  All Categories
</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-warning">
  <tr class="text-center">
    <th>SL No.</th>
    <th>Category Name</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>  

  </thead>
  <tbody class="bg-secondary text-light">
  <?php
    $select_cat= "SELECT * FROM categories ORDER BY category_name asc";
    $result=mysqli_query($con,$select_cat);
    $num=0;
    while($row=mysqli_fetch_assoc($result)){
      $category_id=$row['category_id'];
      $category_name=$row['category_name'];
      $num++;
  ?>
    <tr class="text-center">
      <td><?php echo $num;?></td>
      <td><?php echo $category_name;?></td>
      <td><a href='index.php?edit_category=<?php echo $category_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
      <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
<?php
}
?>
  </tbody>
</table>