<?php
// Header
include_once('include/header.php');
?>

<!-- Html -->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="contact.php" class="form" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label><br>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Enter Message" class="form-control"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Send Message" name="sendMessage" class="">
                    </div>
                </form>
            </div>
            <div class="col-md-6 pt-5">
                <img src="asset/img/contact-us.jpg" alt="contact-us" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');
?>