<?php
  if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    // delete query
    $delete_query="DELETE FROM categories WHERE category_id=$delete_category";
    $result=mysqli_query($con,$delete_query);
    if($result){
      echo "<script>alert('Deletion successful')</script>";
      echo "<script>window.open('index.php?view_categories.php','_self')</script>";
    }
  }
?>