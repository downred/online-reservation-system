<!DOCTYPE html>
<?php
include "dbConnect.php";
include "news_db_utils.php";

$newsDBUtils = new NewsDBUtils();

$result = $newsDBUtils->getTeRejat();

$main_article_type = "Titull kryesor";
$other_titles_type = "Te rejat";

$main_title = array_values(array_filter($result, function ($item) use ($main_article_type) {
    return filterByArticleType($item, $main_article_type);
}));


$other_titles = array_values(array_filter($result, function ($item) use ($other_titles_type) {
    return filterByArticleType($item, $other_titles_type);
}));

function filterByArticleType($item, $article_type)
{
    return $item['lloji_i_lajmit'] == $article_type;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Të rejat</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/news.css">
</head>

<body>
    <?php require_once(__DIR__ . '/nav-bar.php'); ?>
    <main>
        <div class="content-wrapper">
            <?php if (!empty($main_title)): ?>
                <section>
                    <div class="main-title-wrapper">
                        <div class="main-title-img article-img-border">
                            <img src="<?php echo $main_title[0]["photo_path"] ?>" alt="">
                        </div>
                        <div class="main-title-details">
                            <div class="main-title-header">
                                <h1>
                                    <?php echo $main_title[0]["titulli"] ?>
                                </h1>
                            </div>
                            <div class="main-title-text">
                                <?php echo $main_title[0]["detajet"] ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <section>
                <div class="latest-wrapper">
                    <h1>Të fundit</h1>
                    <div class="latest-articles">
                        <?php foreach ($other_titles as $article): ?>
                            <div class="article">
                                <div class="article-img article-img-border">
                                    <img src="<?php echo $article["photo_path"] ?>" alt="">
                                </div>
                                <div class="article-details">
                                    <h2>
                                        <?php echo $article["titulli"] ?>
                                        </h3>
                                        <p>
                                            <?php echo $article["detajet"] ?>
                                        </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>