<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Elective Course Registration</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <section class="sub-header">
            <nav>
                <a href="index.php"><img src="images/logoSdm.png" alt="sdm"></a>
                <label class="label">SDMIT</label>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="courses.php">Course</a></li>
                <li><a href="seats.php">Seats</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>

            <h1>Contact Us</h1>
        </section>


        <section class="location">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.7163786808424!2d75.33842767363309!3d12.98998358732707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba4c9d62fe87bc3%3A0x229a721cca7f29e5!2sSDM%20Institute%20of%20Technology%20(SDMIT)%20Ujire!5e0!3m2!1sen!2sin!4v1693227367415!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <section class="contact-us">
            <div class="row">
                <div class="contact-col">
                    <div>
                        <i class="fa fa-home"></i>
                        <span>
                            <h5>Dharmasthala Rd, near Siddhavana</h5>
                            <p> Ujire, Karnataka 574240</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <span>
                            <h5>08256236961</h5>
                            <p> Monday - Saturday</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-globe"></i>
                        <span>
                            <h5>https://sdmit.in</h5>
                            <p> Visit Us</p>
                        </span>
                    </div>
                </div>
                <div class="contact-col">
                    <form action="formhandler.php" method="POST">
                        <input type="text" name="name"placeholder="Enter your name" required>
                        <input type="email" name="email"placeholder="Enter your email address" required>
                        <input type="text"   name="subject"placeholder="Enter your subject" required>
                        <textarea  rows="8" name="message"placeholder="Message" required></textarea>
                        <button type="submit" class="hero-btn red-btn">Send Message</button>

                    </form>
                </div>
            </div>
        </section>

        <!-- <section class="footer">

            <p>
                Copyright &#169 mariyammathul-samla | All Rights Reserved | Designed by:sdmit
            </p>
            <div class="icons">
                <i class="fa fa-twitter"></i>

                <i class="fa fa-instagram"></i>
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-envelope"></i>
            </div>
            <p>Made with <i class="fa fa-heart-o"></i> By Samla</p>

        </section> -->
        
<?php
include 'footer.php';
?>









        <script src="script.js"></script>
    </body>

    </html>
</body>

</html>