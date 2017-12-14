<?php include("includes/header.php");?>


<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>View All Learners</h2>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Learners Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>  
                            <th>Learners Email</th> 
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $user = "select * from learners";
                        $run_user = mysqli_query($con,$user); 
                        while($user_row = mysqli_fetch_array($run_user)):
                        $user_id = $user_row ['luser_id'];   
                        $fname = $user_row ['luser_fname']; 
                        $lname = $user_row ['luser_lname']; 
                        $uemail = $user_row ['luser_email'];   
                        $uname = $user_row ['luser_name']; 
                        ?>             
                          <tr>
                            <td><?php echo $user_id;?></td>
                            <td><?php echo $fname;?></td>
                            <td><?php echo $lname;?></td>
                            <td><?php echo $uemail;?></td> 
                            <td><?php echo $uname;?></td> 
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


