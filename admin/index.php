<?php include("includes/header.php");?> 
<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>Admin Dashboard</h2>
                    <div class="row">
                        <div class="col-md-4 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tachometer fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            $post = "SELECT * FROM `posts`";
                                            $run_post = mysqli_query($con,$post);  
                                            $num_rows = mysqli_num_rows($run_post);   
                                            ?>
                                            <div class="huge"><?php echo $num_rows;?></div> 
                                            <div>All Courses</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="view_post.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-mortar-board  fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            $learner = "SELECT * FROM `learners`";
                                            $run_learner = mysqli_query($con,$learner);  
                                            $num_rows_learner = mysqli_num_rows($run_learner);   
                                            ?>
                                            <div class="huge"><?php echo $num_rows_learner;?></div>
                                            <div>All Learners</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="all_learners.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-6">
                            <div class="panel panel-orange">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-group fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            $instructors = "SELECT * FROM `instructors`";
                                            $run_instructors = mysqli_query($con,$instructors);  
                                            $num_rows_instructors = mysqli_num_rows($run_instructors);   
                                            ?>
                                            <div class="huge"><?php echo $num_rows_instructors;?></div>
                                            <div>Total Instructors</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="all_instructors.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-6">
                            <div class="panel panel-blue">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-bar-chart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php
                                            $categories = "SELECT * FROM `categories`";
                                            $run_categories = mysqli_query($con,$categories);  
                                            $num_rows_categories = mysqli_num_rows($run_categories);   
                                            ?>
                                            <div class="huge"><?php echo $num_rows_categories;?></div>
                                            <div>Total Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="view_categories.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>                        
                    </div> 
                    <hr >                  
                   <div class="row">
                       <div class="col-md-6 col-sm-12">
                           <div class="latest_admin_post admin_latest">
                               <h3>Latest Courses</h3>
                                <?php 
                                $post = "select * from posts LIMIT 5";
                                $run_post = mysqli_query($con,$post); 
                                while($post_row = mysqli_fetch_array($run_post)):
                                $post_id = $post_row ['post_id'];   
                                $post_title = $post_row ['post_title']; 
                                $post_image = $post_row ['post_image']; 
                                $post_date = $post_row ['post_date']; 
                                $post_author = $post_row ['post_author'];  
                                $post_content = substr($post_row ['post_content'],0,100); 
                                ?>
                                <h4 style="margin-top:20px;margin-bottom:5px"><?php echo $post_title;?></h4>
                                <p ><?php echo $post_content;?></p>
                                <?php endwhile;?>
                           </div>
                       </div>
                       <div class="col-md-6 col-sm-12">
                           <div class="latest_admin_categories admin_latest">
                               <h3>Latest Categories</h3>
                               <ul>
                                <?php 
                                $cat_other = "select * from categories LIMIT 5";
                                $run_cat_other = mysqli_query($con,$cat_other); 
                                while($cat_other_row = mysqli_fetch_array($run_cat_other)): 
                                $category_other_name = $cat_other_row['cat_name'];
                                ?> 
                                   <li><?php echo $category_other_name;?></li>
                                <?php endwhile;?>
                               </ul>
                           </div>
                       </div> 
                       <div class="col-md-6 col-sm-12">
                           <div class="latest_admins admin_latest">
                               <h3>Instructors</h3>
                               <ul>
                                <?php 
                                $user = "select * from instructors LIMIT 5";
                                $run_user = mysqli_query($con,$user); 
                                while($user_row = mysqli_fetch_array($run_user)):    
                                $uname = $user_row ['user_name']; 
                                $uemail = $user_row ['user_email'];   
                                ?>
                                <li><span><?php echo $uname;?></span>    <span><?php echo $uemail;?></span></li>
                                <?php endwhile;?>
                                </ul>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section> 
<?php include("includes/footer.php");?>
  
