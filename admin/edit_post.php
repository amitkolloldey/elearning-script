<?php include("includes/header.php");?>


<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>Edit The Course</h2>
                    <?php 
                    if(isset($_GET['edit'])){
                    $post_get_id = $_GET['edit'];
                    $post = "select * from posts where post_id = '$post_get_id'";
                    $run_post = mysqli_query($con,$post); 
                    while($post_row = mysqli_fetch_array($run_post)):
                    $post_id = $post_row ['post_id']; 
                    $cat_id = $post_row ['cat_id']; 
                    $post_title = $post_row ['post_title'];  
                    $post_date = $post_row ['post_date']; 
                    $post_author = $post_row ['post_author']; 
                    $post_featured_image = $post_row ['post_image'];  
                    $post_keywords = $post_row ['post_keywords'];
                    $post_content = $post_row ['post_content']; 
                    $post_video = $post_row ['video_link']; 
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
                        <p>
                            <label for="post_title">Course Title</label>
                            <input type="text" placeholder="Post title" name="post_title" value="<?php echo $post_title;?>">
                        </p>
                        <p>
                            <label for="post_content">Course Content</label>
                            <textarea name="post_content" cols="30" rows="10" ><?php echo $post_content;?></textarea>
                        </p>
                        <p>
                            <label for="post_video_link">Youtube Video Link</label>
                            <input type="url" placeholder="Course Youtube Video Link" name="post_video_link" value="<?php echo $post_video;?>">
                        </p>
                        <p>
                            <label for="post_featured_image">Course Featured Image</label> 
                            <input type="file" value="Post Featured Image" name="post_featured_image" value="<?php echo $post_featured_image;?>">
                        </p>
                        <p>
                            <label for="post_categories">Course Category</label>
                            <select name="post_categories" id="select_cat">
                                 
                                <?php 
                                $cat = "select * from categories where cat_id = '$cat_id'";
                                $run_cat = mysqli_query($con,$cat); 
                                while($cat_row = mysqli_fetch_array($run_cat)):
                                $category_id = $cat_row['cat_id'];
                                $category_name = $cat_row['cat_name'];
                                ?>
                                <option value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
                                <?php endwhile;?>
                                <?php 
                                $cat_other = "select * from categories";
                                $run_cat_other = mysqli_query($con,$cat_other); 
                                while($cat_other_row = mysqli_fetch_array($run_cat_other)):
                                $category_other_id = $cat_other_row['cat_id'];
                                $category_other_name = $cat_other_row['cat_name'];
                                ?>
                                <?php 
                                if($category_other_id != $cat_id){
                                ?>
                                <option value="<?php echo $category_other_id;?>"><?php echo $category_other_name;?></option>
                                <?php 
                                };
                                ?>
                                <?php endwhile;?>
                            </select>
                        </p> 
                        <p>
                            <label for="post_keywords">Course Tag</label>
                            <input type="text" placeholder="Add Tag" name="post_keywords" value="<?php echo $post_keywords;?>">
                        </p>
                        <p>
                            <label for="post_author">Course Author</label>
                            <input type="text" placeholder="Author Name" name="post_author" value="<?php echo $post_author;?>">
                        </p>
                        <input type="hidden" name="hidden" value="<?php echo $post_id;?>">
                        <p> 
                            <input type="submit" value="Update" name="update_post">
                        </p>
                    </form>
                    <?php endwhile;?>
                    <?php };?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
/*
Update Query
*/
if(isset($_POST['update_post'])){  
$post_title = $_POST['post_title'];
$post_id = $_POST['hidden'];
$post_content = mysqli_real_escape_string ($con,$_POST['post_content']);
$post_video_link = mysqli_real_escape_string ($con,$_POST['post_video_link']);
$post_featured_image = $_FILES['post_featured_image']['name'];
$post_featured_image_tmp = $_FILES['post_featured_image']['tmp_name'];
$post_categories = $_POST['post_categories'];
$post_keywords = $_POST['post_keywords'];
$post_author = $_POST['post_author'];
$post_date = date('d-m-y');  
 
    move_uploaded_file($post_featured_image_tmp,"images/$post_featured_image");
    $update_post = "UPDATE posts SET cat_id='".$post_categories."',post_title='".$post_title."',post_date='".$post_date."',post_author='".$post_author."',post_keywords='".$post_keywords."',post_content='".$post_content."',video_link='".$post_video_link."' WHERE post_id='".$post_id."'"; 
    $run_update = mysqli_query($con,$update_post);  
        if($run_update){
            echo "<script>alert('Course Updated Successfully!!')</script>";
            echo "<script>window.open('view_post.php','_self');</script>"; 
        }
    }
 
?>

<?php include("includes/footer.php");?>


