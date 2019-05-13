            <div class="menu_top">
                <ul>
                    <li><a href="index.php">Home</a></li> 
                    <?php 
                    $cat = "select * from categories LIMIT 2";
                    $run_cat = mysqli_query($con,$cat); 
                    while($cat_row = mysqli_fetch_array($run_cat)):
                    $category_id = $cat_row['cat_id'];
                    $category_name = $cat_row['cat_name'];
                    ?>
                    <li><a href="single-cat.php?cat_id=<?php echo $category_id;?>"><?php echo $category_name;?></a></li>
                    <?php endwhile;?>
                    <li><a href="#">All Course Categories</a>
                        <ul>
                           <?php 
                            $cat2 = "select * from categories";
                            $run_cat2 = mysqli_query($con,$cat2); 
                            while($cat_row2 = mysqli_fetch_array($run_cat2)):
                            $category_id2 = $cat_row2['cat_id'];
                            $category_name2 = $cat_row2['cat_name'];
                            ?>
                            <li><a href="single-cat.php?cat_id=<?php echo $category_id2;?>"><?php echo $category_name2;?></a></li>
                            <?php endwhile;?>
                        </ul>
                    </li>
                    <li><a href="admin/registration.php">Become An Instructor</a>
                        <ul>
                            <li><a href="admin/login.php">Login As Instructor</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>