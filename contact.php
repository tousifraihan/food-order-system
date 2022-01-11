
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>contact form</title>
        <link rel="stylesheet" href="css/contact.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    </head>
    <body>
        <div class="contact-section">
            <div class="contact-info">
                <div><i class="fas fa-map-marker-alt"></i>13/C sonargaon road ,Uttara ,Dhaka ,Bangladesh</div>
                <div><i class="fas fa-envelope"></i>kmdraihanfnf@gmail.com</div>
                <div><i class="fas fa-phone"></i>+880 1303 291551</div>
                <div><i class="fas fa-clock"></i>sun - thu 9:00 am to 5:00 pm</div>
            </div>
            <div class="contact-form">
                <h2>contact us</h2>
                <form class="contact" action="sendEmail.php" method="POST">
                    <input type="email" name="email" class="text-box" placeholder="your email" required>
                    <input type="text" name="subject" class="text-box" placeholder="your email subject" required>
                    
                    <div class="center"><textarea row="5" name="message" placeholder="your text"></textarea></div>
                    <div class="center"><input name="send" type="submit" class="send-btn" value="send">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>