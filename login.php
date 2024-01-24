<!doctype html>
<?php
session_start();

if (isset($_SESSION["userid"])) {
    header("location: index.php");
}

$message;

if (isset($_GET["signupsuccess"])) {
    $message = "<span>Llogarija juaj është krijuar me sukses. Tani mund të kyçeni.</span>";
    $_SESSION["signup_success"] = false;
} else {
    $message = '<span>Nuk keni llogari? Krijoni një <a href="./signup.php">këtu</a></span>';
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    include "dbconnect.php";
    include "login_db_utils.php";
    include "login_contrl.php";

    $login = new LoginContr($email, $password);

    $login->initLogin();

    var_dump($_SESSION["form_data"]);

    unset($_SESSION["form_data"]);
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
    <div class="wrapper">
        <section class="login-image-container">
            <img src="./images/hotel3.jpg" alt="">
        </section>
        <section class="login-section">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="login-container">
                    <div class="login-logo">
                        <img src="./images/logo/logo.png" alt="">
                    </div>
                    <h1>Kyçuni në llogarinë tuaj</h1>
                    <?php
                    echo $message;
                    ?>
                    <input placeholder="Email" type="email" id="email" name="email"
                        value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>"
                        class="login-input">
                    <input placeholder="Fjalëkalimi" type="password" id="password" class="login-input"
                        value="<?php echo isset($_SESSION['form_data']['password']) ? htmlspecialchars($_SESSION['form_data']['password']) : ''; ?>"
                        name="password">
                    <span class="err-msg">
                        <?php
                        if (isset($_SESSION["error_msg"])) {
                            echo $_SESSION["error_msg"];
                        }
                        ?>
                    </span>
                    <button class="btn-light" name="submit" type="submit">Kyçu</button>
                </div>
            </form>
        </section>
    </div>
    <script src="./js/login.js"></script>
</body>

</html>