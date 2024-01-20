<!doctype html>
<?php
session_start();

$message;

if (isset($_SESSION["signup_success"]) && $_SESSION["signup_success"]) {
    $message = "<span>Llogarija juaj është krijuar me sukses. Tani mund të kyçeni.</span>";
    $_SESSION["signup_success"] = false;
} else {
    $message = '<span>Nuk keni llogari? Krijoni një <a href="./signup.php">këtu</a></span>';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Reservation System - Log in</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <?php echo var_dump($_SESSION);?>
    <div class="wrapper">
        <section class="login-image-container">
            <img src="./images/hotel3.jpg" alt="">
        </section>
        <section class="login-section">
            <form action="">
                <div class="login-container">
                    <div class="login-logo">
                        <img src="./images/logo/logo.png" alt="">
                    </div>
                    <h1>Kyçuni në llogarinë tuaj</h1>
                    <?php
                    echo $message;
                    ?>
                    <input placeholder="Email" type="email" id="email" name="email" class="login-input" required>
                    <input placeholder="Fjalëkalimi" type="password" id="password" class="login-input" name="password"
                        required>
                    <span class="err-msg"></span>
                    <button class="btn-light" type="submit" onclick="login(event)">Kyçu</button>
                </div>
            </form>
        </section>
    </div>
    <script src="./js/login.js"></script>
</body>

</html>