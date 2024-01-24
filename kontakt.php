<!doctype html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Reservation System - Kontakt</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/kontakt.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
</head>

<body>
    <div class="wrapper">
        <section class="contact-image-container">
            <img src="./images/hotel12.jpg" alt="">
        </section>
        <section class="contact-section">
            <form action="" method="post">
                <div class="contact-container" style="padding: 1rem">
                    <div class="contact-logo">
                        <img src="./images/logo/logo.png" alt="">
                    </div>
                    <h1>Na kontaktoni</h1>
                    <input placeholder="Emri" type="text" id="name" name="name" class="contact-input">

                    <input placeholder="Mbiemri" type="text" id="lastname" name="lastname" class="contact-input">

                    <input placeholder="Email" type="email" id="email" name="email" class="contact-input">

                    <textarea name="Message" placeholder="Mesazhi juaj" id="message"></textarea>

                    <button class="btn-light" type="submit" name="submit">Dergo mesazhin</button>
                </div>
            </form>
        </section>
    </div>
    <script src="./js/signup.js"></script>
</body>

</html>