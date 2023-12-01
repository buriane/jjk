<?php
    include "connection.php";
    include "functionArticles.php";

    session_start();
    list($articles, $jumlahHalaman, $halamanAktif) = getAllArticles();
    $id = $_GET['id'];

    $query = "SELECT * FROM article WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $article = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jujutsu Kaisen - Shibuya Incident</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="icon" href="assets/icon/jujutsu-kaisen-highschool.ico"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{background-color: rgba(13, 13, 13);}
        </style>
    </head>
    <body>
        <?php include('navbar.php'); ?>
        <div class="article-details">
            <div class="details-content">
                <div class="details-item">
                    <span><a href="index.php">Home</a> &gt; <a href="article.php">Article</a> &gt; <a href="article-details.php">Jujutsu Kaisen (TV)</a></span>
                    <h1><?php echo $article['article_name']; ?></h1>
                    <span><?php echo date('F j, Y', strtotime($article['article_release'])); ?></span>
                    <img src="assets/images/articles/<?php echo $article['article_image']; ?>" alt="Article Image" width="100px">
                    <p><?php echo $article['article_content']; ?></p>
                </div>
                <div class="sidebar-article">
                <h4>Recently Article</h4>
                <div class="sidebar-content">
                    <?php while ($article = mysqli_fetch_array($articles)): ?>
                        <div class="sidebar-item">
                            <a href="article-details.php?id=<?php echo $article['id']; ?>">
                                <ul>
                                    <li><img src="assets/images/articles/<?php echo $article['article_image']; ?>" alt="article-img" width="200px"></li>
                                    <li><p><?php echo mb_strimwidth($article['article_name'], 0, 78, "..."); ?></p></li>
                                    <li><span><?php echo date('F j, Y', strtotime($article['article_release'])); ?></span></li>
                                </ul>
                            </a>
                        </div>
                    <?php endwhile; ?>
                        <a href="article.php" class="btn-article">View More</a>
                </div>
            </div>
            </div>
        </div>
    <div class="footer" id="footer">
        &copy; Jujutsu Kaisen 2023. All rights reserved.
    </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>