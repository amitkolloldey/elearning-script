<?php include("includes/header.php");?>  
<section class="admin_area">
    <div class="container">
        <div class="row">
            <?php include("includes/admin_menus.php");?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="add_admin_content">
                   <h2>Edit User</h2>
                    <?php 
                    if(isset($_GET['edit_user'])){
                    $user_get_id = $_GET['edit_user'];
                    $user = "select * from instructors where user_id = '$user_get_id'";
                    $run_user = mysqli_query($con,$user); 
                    while($user_row = mysqli_fetch_array($run_user)):  
                    $user_id = $user_row ['user_id'];   
                    $user_fname = $user_row ['user_fname'];   
                    $user_lname = $user_row ['user_lname'];   
                    $user_name = $user_row ['user_name'];   
                    $user_email = $user_row ['user_email'];   
                    $admin = $user_row ['admin'];   
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
                        <p>
                            <label for="user_fname">User First Name</label>
                            <input type="text" placeholder="User First Name" name="user_fname" value="<?php echo $user_fname;?>">
                        </p> 
                        <p>
                            <label for="user_lname">User Last Name</label>
                            <input type="text" placeholder="User Last Name" name="user_lname" value="<?php echo $user_lname;?>">
                        </p>
                        <p>
                            <label for="user_name">User Name</label>
                            <input type="text" placeholder="User Name" name="user_name" value="<?php echo $user_name;?>">
                        </p>
                        <p>
                            <label for="user_email">User Email</label>
                            <input type="email" placeholder="User Email" name="user_email" value="<?php echo $user_email;?>">
                        </p>
                         <input type="hidden" name="hidden_id" value="<?php echo $user_id;?>">
                        <p>
                            <label for="user_is_admin">User Is Admin</label>
                            <input type="text" placeholder="User Is Admin?" name="user_is_admin" value="<?php echo $admin;?>">
                            <span>If you want to assign this user to admin then put '1' here.</span>
                        </p>   
                        <p> 
                            <input type="submit" value="Update" name="update_user">
                        </p>
                    </form>
                    <?php endwhile;?>
                    <?php };?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
if(isset($_POST['update_user'])){  
$user_ufname = $_POST['user_fname']; 
$user_id = $_POST['hidden_id']; 
$user_ulname = $_POST['user_lname']; 
$user_uname = $_POST['user_name']; 
$user_uemail = $_POST['user_email']; 
$user_uadmin = $_POST['admin'];
    $update_user = "UPDATE instructors SET user_fname='".$user_ufname."',user_lname='".$user_ulname."',user_name='".$user_uname."',user_email='".$user_uemail."',admin='".$user_uadmin."' WHERE user_id='".$user_id."'"; 
    $run_update_user = mysqli_query($con,$update_user);  
        if($run_update_user){
            echo "<script>alert('Instructor Updated Successfully!!')</script>";
            echo "<script>window.open('all_users.php','_self');</script>"; 
        }
    } 
?> 
<?php include("includes/footer.php");?>


