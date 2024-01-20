<!doctype html>
<?php

if (isset($_POST["submit"])) {
    $emri = $_POST["name"];
    $mbiemri = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    include "dbconnect.php";
    include "signup_db_utils.php";
    include "signup_contr.php";

    $signup = new SignupContr($emri,$mbiemri,$email,$password,$password_confirm);

    $signup->initSignup();

    header("location singup.php?error=none");
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
                    <h1>Hap një llogari të re</h1>
                    <input placeholder="Emri" type="text" id="name" name="name" class="login-input" required>
                    <input placeholder="Mbiemri" type="text" id="lastname" name="lastname" class="login-input" required>
                    <input placeholder="Email" type="email" id="email" name="email" class="login-input" required>
                    <input placeholder="Fjalëkalimi" type="password" id="password" class="login-input" name="password"
                        required>
                    <input placeholder="Konfirmo fjalëkalimin" type="password" id="password_confirm"
                        name="password_confirm" class="login-input" name="password" required>
                    <span class="err-msg"></span>
                    <button class="btn-light" type="submit" name="submit">Kyçu</button>
                </div>
            </form>
        </section>
    </div>
    <script src="./js/signup.js"></script>
</body>

</html>