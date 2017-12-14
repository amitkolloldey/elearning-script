<?php include("includes/header.php");?>


<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>View All Instructor</h2>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Instructor Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>  
                            <th>Instructor Email</th>
                            <th>Admin</th>
                            <th>Delete</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $user = "select * from instructors";
                        $run_user = mysqli_query($con,$user); 
                        while($user_row = mysqli_fetch_array($run_user)):
                        $user_id = $user_row ['user_id'];   
                        $fname = $user_row ['user_fname']; 
                        $lname = $user_row ['user_lname']; 
                        $uemail = $user_row ['user_email'];   
                        $uname = $user_row ['user_name'];   
                        $admin = $user_row ['admin'];   
                        ?>             
                          <tr>
                            <td><?php echo $user_id;?></td>
                            <td><?php echo $fname;?></td>
                            <td><?php echo $lname;?></td>
                            <td><?php echo $uemail;?></td> 
                            <td><?php echo $uname;?></td> 
                            <td><?php echo $admin;?></td> 
                            <td><a href="delete_instructor.php?del_user=<?php echo $user_id;?>">Delete</a></td>
                            <td><a href="edit_instructor.php?edit_user=<?php echo $user_id;?>">Edit</a></td>
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


