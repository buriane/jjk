<?php
    include "connection.php";
    session_start();

    include 'functionArticles.php';

    $articles = getTopArticlesinSeason();
    
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
        <div class="season-section">
            <div class="season-content">
                <h2>Jujutsu Kaisen (TV)</h2>
                <span><a href="index.php">Home</a> &gt; <a href="season.php">Season</a> &gt; <a href="season-one.php">Jujutsu Kaisen (TV)</a></span>
                <div class="season-title">
                    <img src="assets/images/jujutsu-kaisen-watch.jpg" alt="Jujutsu Kaisen Image">
                    <ul>
                        <li><h2>Synopsis Jujutsu Kaisen (TV)</h2></li>
                        <li><p>In a world where demons devour unconscious humans as prey, fragments of the legendary and most feared demon, Ryoumen Sukuna have disappeared without a trace. Any demon that eats Sukuna's limbs will gain power capable of destroying the world. Luckily, there is a mysterious school called Jujutsu that was founded to protect humans from that danger!
                        <br><br>
                        Itadori Yuji is a high school student who spends his time taking care of his sick grandfather. Even though he looks like an average high school student, his extraordinary physical strength makes him stand out from the other students. All the sports extracurriculars wanted to recruit him, but Itadori preferred hanging out with the marginalized students from the magical extracurriculars. One day, the magical extramur gets a cursed heirloom, but they don't know what kind of terror will emerge if the seal is opened.</p></li>
                    </ul>
                </div>
                <div class="season-description">
                    <table>
                        <tr>
                            <td>Title</td>
                            <td>:</td>
                            <td>Sorcery Fight, 呪術廻戦</td>
                        </tr>
                        <tr>
                            <td>Genre</td>
                            <td>:</td>
                            <td>Action, Demons, Horror, School, Shounen, Supernatural</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td>Studio</td>
                            <td>:</td>
                            <td>MAPPA</td>
                        </tr>
                        <tr>
                            <td>Showing</td>
                            <td>:</td>
                            <td>Oct 3, 2020 to Mar 27, 2021</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>:</td>
                            <td>23 min. per ep.</td>
                        </tr>
                        <tr>
                            <td>Number of Episodes</td>
                            <td>:</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>Released on</td>
                            <td>:</td>
                            <td>November 27, 2020</td>
                        </tr>
                    </table>
                </div>
                <div class="season-watch">
                    <iframe src="https://www.youtube.com/embed/xLveUtkjixs" title="TVアニメ『呪術廻戦』PV第3弾" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="season-episode">
                    <h4>Episode Jujutsu Kaisen (TV)</h4>
                    <div class="list-episode">
                        <ul>
                            <li><a href="watch.php">Episode 18</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 17</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 16</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 15</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 14</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 13</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 12</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 11</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 10</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 9</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 8</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 7</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 6</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 5</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 4</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 3</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 2</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                            <li><a href="watch.php">Episode 1</a> <a href="watch.php" class="btn-episode">Watch</a></li>
                        </ul>
                    </div>
                </div>
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
    <div class="footer" id="footer">
        &copy; Jujutsu Kaisen 2023. All rights reserved.
    </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>