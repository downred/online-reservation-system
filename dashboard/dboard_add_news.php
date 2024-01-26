<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard/dboard-main.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Shto një lajm të ri</title>
</head>

<body>
    <div class="wrapper">
        <div class="navbar-container">
            <?php require_once(__DIR__ . '/navbar.php') ?>
        </div>
        <div class="content-container">
            <div class="header">
                <h1>Shto një lajm të ri</h1>
            </div>
            <form action="" method="post">
                <div class="form-container">
                    <div class="form-row">
                        <label for="title">Titulli</label>
                        <input type="text" name="title" id="title" class="input">
                    </div>
                    <div class="form-row">
                        <label for="details">Detajet</label>
                        <textarea type="text" name="details" id="details" class="input"></textarea>
                    </div>
                    <div class="form-row">
                        <label for="news_type">Lloji i lajmit</label>
                        <select id="news_type" name="details">
                            <option value="main_title">Titull kryesor</option>
                            <option value="ordinary_news">Te rejat</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="photo">Fotografia</label>
                        <input type="file" name="photo" id="photo">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>