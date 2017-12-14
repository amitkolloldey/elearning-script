<?php 
include("includes/header.php");
?> 
<section class="content_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-top:40px"> 
                <div class="our_latest_courses">
                    <?php 
                    if(isset($_GET['search_submit'])){
                    $search_key = $_GET['search'];
                    $search = "select * from posts where post_keywords like '%$search_key%'";  
                    $run_search = mysqli_query($con,$search);   
                    $count = mysqli_num_rows($run_search);    
                    if($count == 0){
                    echo "<h2>No Result Found.Please Try With Another Keywords.</h2>";        
                    }else{                        
                    while($search_row = mysqli_fetch_array($run_search)): 
                    $post_id = $search_row ['post_id'];   
                    $post_title = $search_row ['post_title']; 
                    $post_date = $search_row ['post_date']; 
                    $post_author = $search_row ['post_author']; 
                    $post_featured_image = $search_row ['post_image'];  
                    $post_keywords = $search_row ['post_keywords'];
                    $post_content = substr($search_row ['post_content'],0,200); 
                    ?> 
                    <div class="single_latest">
                        <h2>Search Result For "<?php echo $search_key;?>" </h2>
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
