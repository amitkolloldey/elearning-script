<?php 
include("includes/header.php");
?> 
<section class="content_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top:40px"> 
                <div class="our_latest_courses">
                    <?php 
                    if(isset($_GET['cat_id'])){
                    $cat_get_id = $_GET['cat_id'];
                    $cat = "select * from posts where cat_id = '$cat_get_id'"; 
                    $cat2 = "select cat_name from categories where cat_id = '$cat_get_id'"; 
                    $run_post = mysqli_query($con,$cat); 
                    $run_cat_name = mysqli_query($con,$cat2); 
                    $run_cat_row = mysqli_fetch_array($run_cat_name);
                    $count = mysqli_num_rows($run_post);    
                    if($count == 0){
                    echo "<h2>No posts found in that category.</h2>";        
                    }else{                        
                    while($post_row = mysqli_fetch_array($run_post)): 
                    $post_id = $post_row ['post_id'];   
                    $post_title = $post_row ['post_title']; 
                    $post_date = $post_row ['post_date']; 
                    $post_author = $post_row ['post_author']; 
                    $post_featured_image = $post_row ['post_image'];  
                    $post_keywords = $post_row ['post_keywords'];
                    $post_content = substr($post_row ['post_content'],0,200); 
                    ?> 
                    <div class="single_latest">
                        <h2><?php echo $run_cat_row['cat_name'];?></h2>
                        <h4><a href="single.php?post_id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h4>
                        <p style="margin-bottom:10px"><strong><span>Course Author: <em><?php echo $post_author;?></em></span><span> | </span><span>Started Date: <em><?php echo $post_date;?></em></span></strong></p>
                        <?php echo $post_content;?>
                        <div class="readmore clearfix"><a href="single.php?post_id=<?php echo $post_id;?>">Read More</a></div>
                    </div> 
                    <?php endwhile;?> 
                    <?php
                    };};
                    ?>
                </div>
            </div>
            <div style="margin-top:40px">
                <?php include("includes/sidebar.php");?>
            </div> 
        </div>
    </div>
</section>  
<?php include("includes/footer.php");?>
