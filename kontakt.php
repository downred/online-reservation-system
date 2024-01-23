<!doctype html>
<?php

session_start();

if (isset($_POST["submit"])) {
    $emri = $_POST["name"];
    $mbiemri = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    include "dbconnect.php";
    include "signup_db_utils.php";
    include "signup_contr.php";

    $signup = new SignupContr($emri, $mbiemri, $email, $password, $password_confirm);

    $signup->initSignup();

    unset($_SESSION["form_data"]);
    session_destroy();
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Reservation System - Sign Up</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="wrapper">
        <section class="login-image-container">
            <img src="./images/hotel3.jpg" alt="">
        </section>
        <section class="login-section">
            <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="login-container" style="padding: 1rem">
                    <div class="login-logo">
                        <img src="./images/logo/logo.png" alt="">
                    </div>
                    <h1>Na kontaktoni</h1>
                    <input placeholder="Emri" type="text" id="name" name="name"
                        value="<?php echo isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : ''; ?>"
                        class="login-input">

                    <input placeholder="Mbiemri" type="text" id="lastname" name="lastname"
                        value="<?php echo isset($_SESSION['form_data']['lastname']) ? htmlspecialchars($_SESSION['form_data']['lastname']) : ''; ?>"
                        class="login-input">

                    <input placeholder="Email" type="email" id="email" name="email"
                        value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>"
                        class="login-input">

                    <textarea name="message" placeholder="Mesazhi juaj" id="message" cols="50" rows="10"></textarea>

                    <button class="btn-light" type="submit" name="submit">Dergo mesazhin</button>
                </div>
            </form>
        </section>
    </div>
    <script src="./js/signup.js"></script>
</body>

</html>