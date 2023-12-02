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
                <h2>Jujutsu Kaisen Season 2</h2>
                <span><a href="index.php">Home</a> &gt; <a href="season.php">Season</a> &gt; <a href="season-two.php">Jujutsu Kaisen Season 2</a></span>
                <div class="season-title">
                    <img src="assets/images/season-2.png" alt="Jujutsu Kaisen Image">
                    <ul>
                        <li><h2>Synopsis Jujutsu Kaisen Season 2</h2></li>
                        <li><p>The second season of Jujutsu Kaisen will tell about Gojo's past and the Shibuya Incident Arc. Gojo Satoru's past began 11 years before Yuji Itadori entered Tokyo Jujutsu High School. Gojo Satoru is friends with Suguru Geto, who are both second students at Tokyo Jujutsu High School who received an assignment from Master Tengen to take Riko Amanai back to school. The character named Riko Amanai turns out to be a Plasma Star, a human who matches Master Tengen who needs to change bodies every 500 years. 
                        <br><br>
                        However, many things hinder his mission. Gojo and Suguro have to fight to protect Riko and make Gojo have to be able to fight Toji Fushiguro and various other curses. The second season of Jujutsu Kaisen will feature another exciting battle between Yuji Itadori, Saturo Gojo, and others. As in the first season and film version, MAPPA studio again took over the work on this arc.</p></li>
                    </ul>
                </div>
                <div class="season-description">
                    <table>
                        <tr>
                            <td>Title</td>
                            <td>:</td>
                            <td>Sorcery Fight, JJK, Jujutsu Kaisen 2nd Season, 呪術廻戦</td>
                        </tr>
                        <tr>
                            <td>Genre</td>
                            <td>:</td>
                            <td>Action, Fantasy, School, Shounen</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Ongoing</td>
                        </tr>
                        <tr>
                            <td>Studio</td>
                            <td>:</td>
                            <td>MAPPA</td>
                        </tr>
                        <tr>
                            <td>Showing</td>
                            <td>:</td>
                            <td>Ongoing from Jul 6, 2023</td>
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
                            <td>July 5, 2023</td>
                        </tr>
                    </table>
                </div>
                <div class="season-watch">
                    <iframe src="https://www.youtube.com/embed/aybr_9MzKXI" title="TVアニメ『呪術廻戦』第2期「懐玉・玉折」PV第1弾｜7月6日から毎週木曜夜11時56分～MBS/TBS系列全国28局にて放送開始!!" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="season-episode">
                    <h4>Episode Jujutsu Kaisen Season 2</h4>
                    <div class="list-episode">
                        <ul>
                        <?php
                            $sql = "SELECT * FROM episode JOIN season ON episode.id_season = season.id_season WHERE episode.id_season = 2 ORDER BY file_uploaded DESC";
                            $query = mysqli_query($conn, $sql); 
                            while($data = mysqli_fetch_array($query)){
                            ?>
                            <li><a href="watch.php?id-episode=<?php echo $data['id_episode'];?>"><?php echo $data['episode'];?></a> <a href="watch.php?id-episode=<?php echo $data['id_episode'];?>" class="btn-episode">Watch</a></li>
                            <?php } ?>
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