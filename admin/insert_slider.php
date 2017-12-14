<?php include("includes/header.php");?>


<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>Insert Homepage Slider</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">   
                        <p>
                            <label for="slider_image">Slider Image</label>
                            <input type="file" value="Slider Image" name="slider_image">
                        </p> 
                        <p> 
                            <input type="submit" value="Publish" name="publish_slider">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
if(isset($_POST['publish_slider'])){  
$slider_image = $_FILES['slider_image']['name'];
$slider_image_tmp = $_FILES['slider_image']['tmp_name']; 
    if($slider_image == ''){
    echo "<script>alert('Please Add An Image')</script>";
        exit();
    }
    else{
    move_uploaded_file($slider_image_tmp,"images/slider/$slider_image");
    $insert_slider = "insert into slider (slide_image) values ('$slider_image')";
    $run_query_slider = mysqli_query($con,$insert_slider);
        if($run_query_slider){
            echo "<script>alert('Slider Published Successfully!!')</script>";
            echo "<script>window.open('insert_slider.php','_self');</script>"; 
        }
    }
}
?>

<?php include("includes/footer.php");?>


