<?php
    session_start();
    include 'connection.php';
    include 'functionArticles.php';

    $articles = getTopArticles();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jujutsu Kaisen - Shibuya Incident</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="icon" href="assets/icon/jujutsu-kaisen-highschool.ico"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="hero">
            <video autoplay loop muted plays-inline class="background-video">
                <source src="assets/videos/display.mp4" type="video/mp4">
            </video>
            <?php include("navbar.php"); ?>
            <div class="gradient-hero"></div>
            <div class="content">
                <h1>Jujutsu Kaisen</h1>
                <p class="typed-out">Jujutsu Kaisen is a Japanese manga series written and illustrated by Gege Akutami and serialized in Shueisha's shōnen.</p>
                <a href="season.php">Watch</a>
            </div>
        </div>
        <div class="anime-display" id="anime-display">
            <div class="display-content">
                <img src="assets/images/shibuya-incident.png" class="img-display" alt="Jujutsu Kaisen">
                <div class="display-title">
                    <h4>Jujutsu Kaisen</h4>
                    <div class="display-subtitle">
                        <ul>
                            <li>2020</li>
                            <li>|</li>
                            <li><span class="display-maturity">16+</span></li>
                            <li>|</li>
                            <li>2 Seasons</li>
                            <li>|</li>
                            <li>Anime</li>
                        </ul>
                    </div>
                    <p class="display-paragraph">With his days numbered, high schooler Yuji decides to hunt down and consume the remaining 19 fingers of a deadly curse so it can die with him.</p>
                    <span class="display-footer">
                        <span class="display-mark">Starring: </span>
                        Junya Enoki, Yuma Uchida, Asami Seto
                    </span>
                </div>
            </div>
        </div>
        <div class="anime-character" id="anime-character">
            <div class="character-content">
                <div class="character-title">
                    <span class="character-mark">Jujutsu Character's</span>
                    <h1 id="character-h1">Yuji Itadori</h1>
                    <p id="character-p">Yuji is protagonist of the Jujutsu Kaisen series, who was living a normal life until he encountered Megumi and ate one of Sukuna's fingers</p><br>
                    <div class="character-box">
                        <ul>
                            <li><a onclick="itadoriYuji();"><img src="assets/images/characters/yuji-itadori.jpg" class="img-character" alt="Yuji Itadori"></a></li>
                            <li><a onclick="gojoSatoru();"><img src="assets/images/characters/gojo-satoru.jpg" class="img-character" alt="Gojo Satoru"></a></li>
                            <li><a onclick="megumiFushiguro();"><img src="assets/images/characters/megumi-fushiguro.jpg" class="img-character" alt="Megumi Fushiguro"></a></li>
                            <li><a onclick="nobaraKugisaki();"><img src="assets/images/characters/suguru-geto.jpg" class="img-character" alt="Suguru Geto"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="merchandise-jujutsu">
            <div class="merchandise-items">
                <h1><em>Jujutsu Kaisen</em> Merchandise</h1>
                <center>
                <div class="items">
                    <ul>
                        <li>
                            <a href="https://jujutsukaisen.store/products/jujutsu-kaisen-hoodie-satoro-gojo-pullover-hoodie-best-selling-2021/"><img src="assets/images/products/product-1.png" class="merchandise-img"></a>
                            <h6>Satoru Gojo Pullover Hoodie</h6>
                            <p>$40,67</p>
                        </li>
                        <li>
                            <a href="https://jujutsukaisen.store/products/jujutsu-kaisen-gojo-t-shirt/"><img src="assets/images/products/product-2.png" class="merchandise-img"></a>
                            <h6>Jujutsu Kaisen Gojo T-Shirt</h6>
                            <p>$23,90</p>
                        </li>
                        <li>
                            <a href="https://jujutsukaisen.store/products/t-shirt-megumi-fushiguro-jujutsu-kaisen/"><img src="assets/images/products/product-3.png" class="merchandise-img"></a>
                            <h6>Megumi Fushiguro T-Shirt</h6>
                            <p>$23,90</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/jujutsu-kaisen-manga-style-t-shirt/"><img src="assets/images/products/product-4.png" class="merchandise-img"></a>
                            <h6>Manga Style T-Shirt</h6>
                            <p>$23,90</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/t-shirt-toge-inumaki-yosh-jujutsu-kaisen/"><img src="assets/images/products/product-5.png" class="merchandise-img"></a>
                            <h6>Inumaki Yosh Toge T-Shirt</h6>
                            <p>$23,90</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/jujutsu-kaisen-gojo-t-shirt/"><img src="assets/images/products/product-6.png" class="merchandise-img"></a>
                            <h6>Jujutsu Kaisen Gojo T-Shirt</h6>
                            <p>$23,90</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/chaussettes-coton-gojo-saturo-jujutsu-kaisen/"><img src="assets/images/products/product-7.png" class="merchandise-img"></a>
                            <h6>Gojo Saturo Cotton Socks</h6>
                            <p>$14,90</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/jujutsu-kaisen-megumi-hoodie-black/"><img src="assets/images/products/product-8.png" class="merchandise-img"></a>
                            <h6>Megumi Fushiguro Hoodie</h6>
                            <p>$38,95</p>
                        </li>
                        <li><a href=""><img src="assets/images/products/product-9.png" class="merchandise-img"></a>
                            <h6>Jujutsu Kaisen Gojo T-Shirt</h6>
                            <p>$30,00</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/t-shirt-megumi-yuji-et-nobara-jujutsu-kaisen/"><img src="assets/images/products/product-10.png" class="merchandise-img"></a>
                            <h6>Megumi, Yuji, Nobara T-Shirt</h6>
                            <p>$23,90</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/sweat-sukuna-jujutsu-kaisen/"><img src="assets/images/products/product-11.png" class="merchandise-img"></a>
                            <h6>Sukuna Sweatshirt</h6>
                            <p>$38,90</p>
                        </li>
                        <li><a href="https://jujutsukaisen.store/products/jujutsu-kaisen-king-of-plagues-t-shirt/"><img src="assets/images/products/product-12.png" class="merchandise-img"></a>
                            <h6>King of Plagues T-Shirt</h6>
                            <p>$23,90</p>
                        </li>
                    </ul>
                </div><br>
                <a href="https://jujutsukaisen.store/shop" class="more-button">
                    View more
                </a>
                </center>
            </div>
        </div>-->
        <div class="floating-bar">
            <div class="floating-content">
                <div class="floating-items">
                    <ul>
                        <li><img src="assets/images/jujutsu-kaisen-highschool.png" class="floating-image" alt="Jujutsu Kaisen Highschool"></li>
                        <li><p>Watch all you want.</p></li>
                    </ul>
                    <a href="season.php" class="button-floating">Watch</a>
                </div>
            </div>
        </div>
        <div class="article-section">
            <div class="article-content">
                <div class="article-items">
                    <h2>Article <span> Jujutsu Kaisen</span></h2>
                    <div class="article-list">
                    <?php while ($article = mysqli_fetch_array($articles)): ?>
                        <ul>
                            <li>
                                <img src="assets/images/articles/<?php echo $article['article_image']; ?>" alt="article-img" width="200px">
                            </li>
                            <li>
                                <h3><?php echo mb_strimwidth($article['article_name'], 0, 78, "..."); ?></h3>
                                <span><?php echo date('F j, Y', strtotime($article['article_release'])); ?></span>
                                <p><?php echo mb_strimwidth($article['article_content'], 0, 500, "..."); ?></p>
                                <a href="article.php?id=<?php echo $article['id']; ?>">Read More</a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    </div>
                    <div class="article-btn">
                        <a href="article.php">View All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            &copy; Jujutsu Kaisen 2023. All rights reserved.
        </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>