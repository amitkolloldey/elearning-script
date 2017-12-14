<?php 
include("includes/header.php");
?> 
<section class="featured_categories">
   <div class="container">
       <div class="row">
           <div class="col-md-12">
                <div class="section_title text-center contact_title">
                    <h2><i class="fa fa-paper-plane-o"></i>Contact Us</h2>
                    <p>If You Have Any Kind Of Query About This Site Feel Free To Contact Us.We Will Be Happy To Hear From You.</p>
                </div> 
           </div>
       </div> 
        <div class="row">
            <div class="contact_wrap">
                <form action="contact.php" method="post" class="contact_form">
                    <p>
                        <label for="name">Your Name</label>
                        <input type="text" placeholder="Name" name="name" required>
                    </p>
                    <p>
                        <label for="email">Your Email</label>
                        <input type="email" placeholder="Email" name="email" required>
                    </p> 
                    <p>
                        <label for="subject">Subject</label>
                        <input type="subject" placeholder="Subject" name="subject" required>
                    </p> 
                    <p>
                        <label for="message">Your Message</label>
                        <textarea placeholder="Your Message" name="message" rows="10" required></textarea>
                    </p> 
                    <p> 
                        <input type="submit" name="send" value="Send">
                    </p> 
                </form>
            </div>   
        </div>
   </div>
</section>
<?php 
if(isset($_POST['send'])){
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$to = "amitkolloldey@gmail.com";
$send = mail($to,$subject,$message,$email);
if($send = mail($to,$subject,$message,$email)){
echo "<script>alert('Email Has Been Sent Successfully!!Thanks,you will be notify shortly..');</script>";
}
    
}
?>    
<?php include("includes/footer.php");?>
