<?php include("includes/header.php");?>
 
 <?php 
    if(isset($_GET['delete_cat'])){
    $delete_cat_id = $_GET['delete_cat'];
    $delete_cat = "delete from categories where cat_id = '$delete_cat_id'";
    $del_cat = mysqli_query($con,$delete_cat);  
      
    echo "<script>alert('Category Deleted Successfully!!')</script>";
    echo "<script>window.open('view_categories.php','_self');</script>"; 
        
    };
?>
 

<?php include("includes/footer.php");?>


