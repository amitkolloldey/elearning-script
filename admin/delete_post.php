<?php include("includes/header.php");?>
 
 <?php 
    if(isset($_GET['delete_post'])){
    $delete_post_id = $_GET['delete_post'];
    $delete_post = "delete from posts where post_id = '$delete_post_id'";
    $del_post = mysqli_query($con,$delete_post);  
      
    echo "<script>alert('Course Deleted Successfully!!')</script>";
    echo "<script>window.open('view_post.php','_self');</script>"; 
        
    };
?>
 

<?php include("includes/footer.php");?>


