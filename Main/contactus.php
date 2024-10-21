<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeLine - Contact</title>
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="icon" href="images/transperent.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php
include('header.php');
?>

<section class="a-hero">
  <div class="a-hero-content">
    <h1 class="a-h1">Contact Us</h1>
    <p>We are dedicated to providing exceptional healthcare services.</p>
  </div>
</section>

<div class="entirebox">
    <div class="cubox">
        <div class="cubox1">
            
            <form>
                <label for="fullName">
                    <i class="fa fa-solid fa-user" style="margin: 2px;"></i> Full Name:
                </label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="email">
                    <i class="fa fa-solid fa-envelope" style="margin: 2px;"> </i> Email Address:
                </label>
                <input type="email" id="email" name="email" required>

                <label for="mobile">
                    <i class="fa fa-solid fa-phone" style="margin: 2px;"> </i> Contact No:
                </label>
                <input type="tel" id="mobile" name="mobile" required>

                <label for="msg">
                    <i class="fa fa-solid fa-comment" style="margin: 2px;"> </i> Write Message:
                </label>
                <textarea id="msg" name="msg" rows="5" required> </textarea>

                <button class="submit" type="submit"> Submit </button>
            </form>
        </div>
        <div class="map-div">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2689.1234567890123!2d-122.12345678901234!3d47.67890123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM0zNDjCsDAwJzE1LjUiTiAxMjLCsDAwJzE1LjUiVw!5e0!3m2!1sen!2sus!4v1621345678901!5m2!1sen!2sus"
                width="100%" height="100%" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    </div>
    <div class="contact-details">
    <div class="contact-box">
        <i class="fa fa-phone"></i>
        <h3>Phone Number</h3>
        <p>+1 123-456-7890</p>
    </div>
    <div class="contact-box">
        <i class="fa fa-map-marker"></i>
        <h3>Location</h3>
        <p>Kandy, Sri Lanka</p>
    </div>
    <div class="contact-box">
        <i class="fa fa-clock-o"></i>
        <h3>Opening Hours</h3>
        <p>24 Hours</p>
    </div>
</div>

    
    <?php
// Assuming "lifeline" is the root folder for your project
include('footer.php');
?>
</body>


</html>