<?php include("includes/header.php");?>


<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>View All Posts</h2>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Category Descriptiob</th>
                            <th>Category Icon</th>  
                            <th>Delete Category</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $cat = "select * from categories";
                        $run_cat = mysqli_query($con,$cat); 
                        while($cat_row = mysqli_fetch_array($run_cat)):
                        $cat_id = $cat_row ['cat_id'];   
                        $cat_name = $cat_row ['cat_name']; 
                        $cat_icon = $cat_row ['cat_icon'];   
                        $cat_desc = substr($cat_row ['cat_desc'],0,100); 
                        ?>             
                          <tr>
                            <td><?php echo $cat_id;?></td>
                            <td><?php echo $cat_name;?></td>
                            <td><?php echo $cat_desc;?></td>
                            <td><i class="fa <?php echo $cat_icon;?> fa-5x"></i></td> 
                            <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
                          </tr>
                        <?php endwhile;?>   
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</section>
 

<?php include("includes/footer.php");?>


