<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Reservation System</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/ballina.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <ul class="nav-container">
                <div class="nav-section-one">
                    <li>
                        <img src="./images/logo/logo.png" alt="" width="70px">
                    </li>
                    <li>
                        <div><a href="index.html">Ballina</a></div>
                    </li>
                    <li>
                        <div><a href="rezervo.html">Hotelet</a></div>
                    </li>
                    <li>
                        <div><a href="rreth-nesh.html">Rreth nesh</a></div>
                    </li>
                    <li>
                        <div><a href="news.html">Të rejat</a></div>
                    </li>
                </div>
                <li class="nav-section-two">
                    <a class="btn-light" href="login.php">Kyçu</a>
                </li>
            </ul>
        </nav>
        <div style="position: relative; height: 75vh">
            <div class="landing-img">
                <img src="./images/landing.jpg" class="">
            </div>
            <div class="hero-content">
                <h1>
                    Zbulo aventurën tënde, rezervo një ëndërr.
                </h1>
                <a class="btn-primary" href="rezervo.html">Rezervo tani</a>
            </div>
        </div>
    </header>
    <main>
        <section id="s1">
            <h3>Hotelet tona</h3>
            <div class="slider">
                <button class="slide-btn slide-btn-left" onclick="slideLeft()">
                    < </button>
                        <div class="slider-images-wrapper">
                            <div class="slider-images">
                                <!--                    <div class="slider-img">-->
                                <!--                        <img src="./images/hotel1.jpg" alt="" id="1">-->
                                <!--                    </div>-->
                            </div>
                        </div>
                        <button class="slide-btn slide-btn-right" onclick="slideRight()">
                            >
                        </button>
            </div>
        </section>
        <section id="s2">
            <h3>Çfarë thonë të tjerët për ne?</h3>
            <div class="person-info-wrapper">
                <div class="person-info-container">
                    <div class="person">
                        <img src="./images/icons/circle.png" alt="">
                    </div>
                    <div class="person-info">
                        <p>Kam kaluar momente te paharruara gjate pushimit tim vitin e kaluar dhe definitivisht do doja
                            te kthehem prap.</p>
                        <p class="person-name">Filan Fisteku</p>
                    </div>
                </div>
                <div class="person-info-container">
                    <div class="person">
                        <img src="./images/icons/circle.png" alt="">
                    </div>
                    <div class="person-info">
                        <p>Hotelet me te bukura ne bote. Me te vertete si nje enderr...</p>
                        <p class="person-name">Filan Fisteku</p>
                    </div>
                </div>
                <div class="person-info-container">
                    <div class="person">
                        <img src="./images/icons/circle.png" alt="">
                    </div>
                    <div class="person-info">
                        <p>Ushqimi ishte i klasit me te larte dhe çmimet shume te arsyeshme.</p>
                        <p class="person-name">Filan Fisteku</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="contacts-wrapper">
            <div class="logo-wrapper">
                <div class="logo-container">
                    <img src="./images/logo/logo.png" alt="" width="75px">
                </div>
                <span class="copyright">
                    &copy; 2023 QuickStay, Inc. Te gjitha te drejtat e rezervuara
                </span>
            </div>
            <div class="additional-info">
                <p style="font-weight: bold">Na kontaktoni</p>
                <p style="font-weight: 300">info@quickstay.net</p>
                <p style="font-weight: 500">+383 49 123 123</p>
            </div>
        </div>
    </footer>
    <script src="./js/slider.js"></script>
</body>

</html>