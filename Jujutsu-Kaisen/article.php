<?php
    include "connection.php";
    include "functionArticles.php";

    session_start();
    list($articles, $jumlahHalaman, $halamanAktif) = getAllArticles();

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
        <div class="article-page">
            <div class="container-article">
                <div class="sub-article">
                    <h2>Article Lists</h2>
                    <span><a href="index.php">Home</a> &gt; <a href="article.php">Article</a></span>
                    <?php while ($article = mysqli_fetch_array($articles)): ?>
                    <div class="article-item">
                        <ul>
                            <li><a href=""><img src="assets/images/articles/<?php echo $article['article_image'] ?>" alt="Article Image"></a></li>
                            <li class="right">
                                <a href="article.php?id=<?php echo $article['id']; ?>" class="btn-news">News</a>
                                <a href="article.php?id=<?php echo $article['id']; ?>"><h2><?php echo $article['article_name']; ?></h2></a>
                                <span><?php echo date('F j, Y', strtotime($article['article_release'])); ?></span>
                            </li>
                        </ul>
                    </div>
                    <?php endwhile; ?>
                    <div class="article-pagination">
                        <!-- Pagination -->
                        <?php if ($halamanAktif > 1) : ?>
                            <a href="?halaman=<?= $halamanAktif - 1 ?>" class="btn-pagination">&lt;</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <a href="?halaman=<?= $i; ?>" class="btn-pagination" style="background:#760021;color:#767676"><?= $i; ?></a>
                            <?php else : ?>
                                <a href="?halaman=<?= $i; ?>" class="btn-pagination"><?= $i; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <a href="?halaman=<?= $halamanAktif + 1 ?>" class="btn-pagination">&gt;</a>
                        <?php endif; ?>
                        <!-- End of Pagination -->
                    </div>
                </div>
                <!--
                <div class="sidebar-article">
                    <div class="sidebar-content">
                        <h2>Popular Article</h2>
                        <div class="sidebar-item">
                            <a href=""><ul>
                                <li><img src="assets/images/articles/article-01.png"></li>
                                <li><h4>Yuji Itadori di Jujutsu Kaisen, siapakah dia?</h4></li>
                                <li><span>September 27, 2023</span></li>
                            </ul></a>
                        </div>
                        <div class="sidebar-item">
                            <a href=""><ul>
                                <li><img src="assets/images/articles/article-02.jpeg"></li>
                                <li><h4>Kematian Gojo Satoru, Begini Komentar Komikus!</h4></li>
                                <li><span>September 25, 2023</span></li>
                            </ul></a>
                        </div>
                        <div class="sidebar-item">
                            <a href=""><ul>
                                <li><img src="assets/images/articles/article-03.jpeg"></li>
                                <li><h4>Penjelasan Akhir Film Jujutsu Kaisen!</h4></li>
                                <li><span>March 25, 2023</span></li>
                            </ul></a>
                        </div>
                        <div class="sidebar-item">
                            <a href=""><ul>
                                <li><img src="assets/images/articles/article-01.png"></li>
                                <li><h4>Yuji Itadori di Jujutsu Kaisen, siapakah dia?</h4></li>
                                <li><span>27 December 2023</span></li>
                            </ul></a>
                        </div>
                    </div>
                </div>-->
        </div>
    </div>
    <div class="footer" id="footer">
        &copy; Jujutsu Kaisen 2023. All rights reserved.
    </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>