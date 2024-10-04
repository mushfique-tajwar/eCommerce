<?php
  if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    $get_categories="SELECT * FROM categories WHERE category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_name=$row['category_name'];
  }
  if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_name'];
    $update_query="UPDATE categories SET category_name='$cat_title' WHERE
    category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
    echo "<script>alert('Category is been updated successfully')</script>"; 
    echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
  }}
?>
<div class="container mt-3">
  <h1 class='text-center'>Editing Category</h1>
  <form action="" method="post" class='text-center'>
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="category_name" class="form-lable">Category Name</label>
      <input type="text" name="category_name" id="category_name" class="form-control" required="required" value='<?php echo $category_name ?>'>
    </div>
    <input type="submit" Value="Update Category" class="btn btn-warning px-3 mb-3" name='edit_cat'>
  </form>
</div>