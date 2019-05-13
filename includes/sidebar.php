            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="sidebar_right">
                   <div class="search_sidebar">
                        <form action="search.php" class="search_bar" method="get">
                            <input type="Search" placeholder="Search Here" name="search">
                            <input type="Submit" value="Search" name="search_submit">
                        </form>                       
                   </div>
                    <div class="sidebar_categories">
                       <h2>Latest Courses</h2>
                        <ul>
                        <?php 
                        $post = "select * from posts ORDER BY 1 DESC LIMIT 5";
                        $run_post = mysqli_query($con,$post); 
                        while($post_row = mysqli_fetch_array($run_post)):
                        $post_id = $post_row ['post_id'];  
                        $post_title = $post_row ['post_title']; 
                        $post_date = $post_row ['post_date']; 
                        $post_author = $post_row ['post_author'];  
                        $post_content = substr($post_row ['post_content'],0,80); 
                        ?>
                        <li>
                            <h4><a href="single.php?post_id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h4>
                            <span style="display:block;margin-bottom:10px;">Publish Date:<?php echo $post_date;?>  |  Author:<?php echo $post_author;?></span>
                            <?php echo $post_content;?> 
                            <a href="single.php?post_id=<?php echo $post_id;?>">View Full Course</a>
                        </li> 
                        <?php endwhile;?>  
                        </ul>
                    </div>
                    <div class="sidebar_categories">
                       <h2>Course Categories</h2>
                        <ul>
                            <?php 
                            $category = "select * from categories";
                            $run_category = mysqli_query($con,$category); 
                            while($category_row = mysqli_fetch_array($run_category)):    
                            $cat_id = $category_row ['cat_id'];   
                            $cat_name = $category_row ['cat_name'];     
                            ?>
                            <li><a href="single-cat.php?cat_id=<?php echo $cat_id;?>"><?php echo $cat_name;?></a></li> 
                            <?php endwhile;?>
                        </ul>
                    </div>
                    <div class="sidebar_banner">
                        <a href="registration.php"><img src="images/register.png" alt="Register Now"></a>
                    </div>
                </div>
            </div>