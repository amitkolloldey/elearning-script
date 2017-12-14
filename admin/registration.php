<?php 
include('includes/connection.php');
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Become An Instrctor</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link href="css/jquery.bxslider.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>        
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section class="login_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <img src="images/logo.png" alt="E-learning">
                        </div>
                        <div class="login_form"> 
                           <h2 style="text-align:center;margin:20px 0;">Become An Instrctor</h2>
                            <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST"> 
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-leaf"></i></span>
                                    <input id="fname" type="text" class="form-control" name="fname" placeholder="First Name">                                        
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-fire"></i></span>
                                    <input id="lname" type="text" class="form-control" name="lname" placeholder="Last Name">                                        
                                </div> 
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="uemail" type="email" class="form-control" name="uemail" placeholder="User Email">                                        
                                </div> 
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="user" type="text" class="form-control" name="user" placeholder="User">                                        
                                </div> 
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                                    <textarea name="about" id="about" rows="10" style="width:100%;border:0;border-top-right-radius:5px;border-bottom-right-radius:5px;padding:10px" placeholder="About Instructor"></textarea>
                                </div> 
                                <div class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                        <input type="submit" value="Submit" class="btn btn-primary pull-right" name="register"/>                         
                                    </div>
                                </div>
                                <p style="color:#fff;font-size:16px;">Already an Instructor?? Login <strong><a href="http://localhost/e-learning/admin/login.php">Here</a></strong> </p>
                            </form>
                            <p style="margin:20px 0;color:#222;text-align:center;font-size:18px;">Go back to the <strong><a href="http://localhost/e-learning/">Site</a></strong> </p>      
                        </div>
                    </div>
                </div>
            </div> 
        </section>

<?php 
if(isset($_POST['register'])){
$fname = mysqli_real_escape_string ($con,$_POST['fname']);  
$lname = mysqli_real_escape_string ($con,$_POST['lname']);  
$uemail = $_POST['uemail'];  
$user = mysqli_real_escape_string ($con,$_POST['user']);  
$about = mysqli_real_escape_string ($con,$_POST['about']);  
$pass = md5($_POST['password']); 

 
        if($fname == '' OR $lname == '' OR $uemail == '' OR $user == '' OR $pass == '' OR $about == ''){
    echo "<script>alert('Please Fill All The Fields')</script>";
        exit();
    }
    else{
    $email_check = "select * from instructors where user_email='$uemail'";
    $username_check = "select * from instructors where user_name='$user'";
    $run_email = mysqli_query($con,$email_check); 
    $run_username = mysqli_query($con,$username_check); 
    if(mysqli_num_rows( $run_email ) > 0 ){ 
        echo "<script>alert('$uemail Already Exist!!');</script>"; 
 
    }
    elseif(mysqli_num_rows( $run_username ) > 0 ){ 
        echo "<script>alert('Username $user Already Exist!!');</script>"; 
 
    }else{
    $insert_user = "insert into instructors (user_fname,user_lname,user_email,user_name,user_pass,about) values('$fname','$lname','$uemail','$user','$pass','$about')";
$run_reg = mysqli_query($con,$insert_user); 
        if($run_reg){
            echo "<script>alert('Registration Successfully!!Please Login!!')</script>";
            echo "<script>window.open('login.php','_self');</script>"; 
        }
    }
    }
    
}        
        
?>         
        
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>   