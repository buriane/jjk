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
        <div class="article-details">
            <div class="details-content">
                <div class="details-item">
                    <span><a href="index.php">Home</a> &gt; <a href="article.php">Article</a> &gt; <a href="article-details.php">Jujutsu Kaisen (TV)</a></span>
                    <h1>Kecelakaan Beruntun di Tol Jagorawi Dini Hari Tadi, 3 Orang Tewas</h1>
                    <span>Thursday. November 30, 2023 | 14:29</span>
                    <img src="assets/images/backgrounds/wallpapersden.com_satoru-gojo-cool-jujutsu-kaisen-hd_1920x1080.jpg" alt="Article Image">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi incidunt velit illum unde, nulla dolor quia tempore quas aspernatur dicta odio soluta corrupti necessitatibus sapiente nam inventore nihil dignissimos quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur illum perspiciatis obcaecati doloribus exercitationem necessitatibus, sit suscipit autem deserunt iure repellat unde dolorum sapiente placeat optio velit tenetur dolor in. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores dolor repudiandae eligendi, incidunt possimus dignissimos impedit dolore officiis fugiat nulla natus debitis perferendis deserunt ad, nemo quam alias quisquam illum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusamus vel iste unde expedita reprehenderit sequi omnis repellendus, exercitationem optio autem placeat fugiat aperiam fugit adipisci animi magni! Fugit, vel.</p>
                </div>
                <div class="sidebar-article">
                    <h4>Recently Article</h4>
                    <div class="sidebar-content">
                            <div class="sidebar-item">
                                <a href=""><ul>
                                    <li><img src="assets/images/articles/article-01.png"></li>
                                    <li><p>Yuji Itadori di Jujutsu Kaisen, siapakah dia?</p></li>
                                    <li><span>27 December 2023</span></li>
                                </ul></a>
                            </div>
                            <div class="sidebar-item">
                                <a href=""><ul>
                                    <li><img src="assets/images/articles/article-02.jpeg"></li>
                                    <li><p>Kematian Gojo Satoru, Begini Komentar Komikus!</p></li>
                                    <li><span>20 December 2023</span></li>
                                </ul></a>
                            </div>
                            <div class="sidebar-item">
                                <a href=""><ul>
                                    <li><img src="assets/images/articles/article-03.jpeg"></li>
                                    <li><p>Penjelasan Akhir Film Jujutsu Kaisen!</p></li>
                                    <li><span>09 November 2023</span></li>
                                </ul></a>
                            </div>
                            <div class="sidebar-item">
                                <a href=""><ul>
                                    <li><img src="assets/images/articles/article-01.png"></li>
                                    <li><p>Yuji Itadori di Jujutsu Kaisen, siapakah dia?</p></li>
                                    <li><span>27 December 2023</span></li>
                                </ul></a>
                            </div>
                            <div class="sidebar-item">
                                <a href=""><ul>
                                    <li><img src="assets/images/articles/article-02.jpeg"></li>
                                    <li><p>Kematian Gojo Satoru, Begini Komentar Komikus!</p></li>
                                    <li><span>20 December 2023</span></li>
                                </ul></a>
                            </div>
                            <a href="" class="btn-article">View More</a>
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