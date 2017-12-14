<?php include("includes/header.php");?>  
<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>Insert New Course</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
                        <p>
                            <label for="post_title">Course Title</label>
                            <input type="text" placeholder="Course title" name="post_title" >
                        </p>
                        <p>
                            <label for="post_content">Course Content</label>
                            <textarea name="post_content" cols="30" rows="10" ></textarea>
                        </p> 
                        <p>
                            <label for="course_video">Course Youtube Link</label>
                            <input type="url" placeholder="Enter Youtube Video Link" name="course_video" >
                        </p>
                        <p>
                            <label for="post_featured_image">Course Featured Image</label>
                            <input type="file" value="Course Featured Image" name="post_featured_image">
                        </p>
                        <p>
                            <label for="post_categories">Course Category</label>
                            <select name="post_categories" id="select_cat">
                                <option value="Select a category">Select a category</option>
                                <?php 
                                $cat = "select * from categories";
                                $run_cat = mysqli_query($con,$cat); 
                                while($cat_row = mysqli_fetch_array($run_cat)):
                                $category_id = $cat_row['cat_id'];
                                $category_name = $cat_row['cat_name'];
                                ?>
                                <option value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
                                <?php endwhile;?>
                            </select>
                        </p> 
                        <p>
                            <label for="post_keywords">Course Tag</label>
                            <input type="text" placeholder="Add Tag" name="post_keywords">
                        </p>
                        <p>
                            <label for="post_author">Course Author</label>
                            <input type="text" placeholder="Author Name" name="post_author">
                        </p>
                        <p> 
                            <input type="submit" value="Publish" name="publish_post">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 

/*
Insert Query
*/
if(isset($_POST['publish_post'])){
$post_title = $_POST['post_title'];
$post_content = mysqli_real_escape_string ($con,$_POST['post_content']);
$course_video = mysqli_real_escape_string ($con,$_POST['course_video']);
$post_featured_image = $_FILES['post_featured_image']['name'];
$post_featured_image_tmp = $_FILES['post_featured_image']['tmp_name'];
$post_categories = $_POST['post_categories'];
$post_keywords = $_POST['post_keywords'];
$post_author = $_POST['post_author'];
$post_date = date('d-m-y');  
    if($post_title == '' OR $post_content == '' OR $post_featured_image == '' OR $post_categories == '' OR $post_keywords == '' OR $post_author == '' OR $course_video == ''){
    echo "<script>alert('Please Fill All The Fields')</script>";
        exit();
    }
    else{
    move_uploaded_file($post_featured_image_tmp,"images/$post_featured_image");
    $insert_post = "insert into posts (cat_id,post_title,post_date,post_author,post_keywords	,post_image,post_content,video_link) values ('$post_categories','$post_title','$post_date','$post_author','$post_keywords','$post_featured_image','$post_content','$course_video')";
    $run_query = mysqli_query($con,$insert_post);
        if($run_query){
            echo "<script>alert('Course Published Successfully!!')</script>";
            echo "<script>window.open('insert_post.php','_self');</script>"; 
        }
    }
}
?> 
<?php include("includes/footer.php");?>


