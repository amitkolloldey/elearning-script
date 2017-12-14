<?php 
include("includes/header.php");
?>
<section class="slider_area">
    <div class="container">
        <div class="row">
           <div class="col-md-12">
                <ul class="bxslider">
                <?php 
                $slide = "select * from slider ORDER BY rand()";
                $run_slider = mysqli_query($con,$slide); 
                while($slider_row = mysqli_fetch_array($run_slider)):
                $slide_id = $slider_row ['slide_id'];
                $slide_image = $slider_row ['slide_image'];
                ?>
                <li><img src="admin/images/slider/<?php echo $slide_image;?>" /></li> 
                <?php endwhile;?> 
                </ul>
           </div> 
        </div>
    </div>
</section>
<section class="featured_categories">
   <div class="container">
       <div class="row">
           <div class="col-md-12">
                <div class="section_title text-center">
                    <h2><i class="fa fa-lightbulb-o"></i>Our Course Categories</h2>
                    <p>Find your course from the categories below.We offer 1000 of courses on different subject.</p>
                </div> 
           </div>
       </div> 
        <div class="row category">
            <?php 
            $category = "select * from categories ORDER BY rand() LIMIT 8";
            $run_category = mysqli_query($con,$category); 
            while($category_row = mysqli_fetch_array($run_category)):    
            $cat_id = $category_row ['cat_id'];   
            $cat_name = $category_row ['cat_name'];   
            $cat_desc = substr($category_row ['cat_desc'],0,100);   
            $cat_icon = $category_row ['cat_icon'];    
            ?>
           <div class="col-md-3 col-sm-4 col-xs-6">
                <div class="single_cat text-center">
                    <i class="fa <?php echo $cat_icon;?>"></i>
                    <h4><?php echo $cat_name;?></h4>
                    <?php echo $cat_desc;?>
                    <div class="see_more">
                        <a href="single-cat.php?cat_id=<?php echo $cat_id;?>">See More</a>
                    </div>                    
                </div>
           </div> 
            <?php endwhile;?>  
        </div>
   </div>
</section>
<section class="content_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12"> 
                <div class="section_title text-center">
                    <h2><i class="fa fa-flash"></i>Latest Courses</h2>
                    <p>Lorem ipsum dolor sit amet, amet eget magna purus, a tempor vel wisi odio.</p>
                </div> 
                <div class="our_latest_courses">
                    <?php 
                    $post = "select * from posts ORDER BY rand() LIMIT 5";
                    $run_post = mysqli_query($con,$post); 
                    while($post_row = mysqli_fetch_array($run_post)):
                    $post_id = $post_row ['post_id']; 
                    $cat_id = $post_row ['cat_id']; 
                    $post_title = $post_row ['post_title']; 
                    $post_date = $post_row ['post_date']; 
                    $post_author = $post_row ['post_author']; 
                    $post_keywords = $post_row ['post_keywords'];
                    $post_content = substr($post_row ['post_content'],0,150); 
                    ?>
                    <div class="single_latest">
                        <h4><a href="single.php?post_id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h4>
                        <p style="margin-bottom:10px"><strong><span>Course Author: <em><?php echo $post_author;?></em></span><span> | </span><span>Started Date: <em><?php echo $post_date;?></em></span></strong></p>
                        <?php echo $post_content;?>
                        <div class="readmore clearfix"><a href="single.php?post_id=<?php echo $post_id;?>">Read More</a></div>
                    </div> 
                    <?php endwhile;?> 
                </div>
            </div>
            <?php include("includes/sidebar.php");?>
        </div>
    </div>
</section>  
<?php include("includes/footer.php");?>
