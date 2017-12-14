<?php include("includes/header.php");?>


<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>Add New Category</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
                        <p>
                            <label for="cat_name">Category Name</label>
                            <input type="text" placeholder="Category Name" name="cat_name" >
                        </p>
                        <p>
                            <label for="category_description">Category Description</label>
                            <textarea name="category_description" cols="30" rows="10" ></textarea>
                        </p> 
                        <p>
                            <label for="category_icon">Category Icon</label>
                            <input type="text" placeholder="Category Icon" name="category_icon" >
                            <span style="font-size:14px">Give font awesome icon code here. (Exp: <em> fa-leaf </em> from <em><a target="_blank" href="https://fortawesome.github.io/Font-Awesome/cheatsheet/"> Here </a></em>)</span>
                        </p>   
                        <p> 
                            <input type="submit" value="Publish" name="publish_category">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
if(isset($_POST['publish_category'])){ 
$cat_name = $_POST['cat_name']; 
$cat_desc = $_POST['category_description']; 
$cat_icon = $_POST['category_icon'];   
    if($cat_name == '' OR $cat_desc == '' OR $cat_icon == ''){
    echo "<script>alert('Please Fill All The Fields')</script>";
        exit();
    }
    else{
     
    $insert_cat = "insert into categories (cat_name,cat_desc,cat_icon) values ('$cat_name','$cat_desc','$cat_icon')";
    $run_query_cat = mysqli_query($con,$insert_cat);
        if($run_query_cat){
            echo "<script>alert('Category Published Successfully!!')</script>";
            echo "<script>window.open('insert_category.php','_self');</script>"; 
        }
    }
}
?>

<?php include("includes/footer.php");?>


