<?php
    include "connection.php";
    session_start();
    
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
        <nav id="navigation-bar">
            <a href="index.php"><img src="assets/images/logo.png" class="logo" alt="Logo"></a>
            <ul>
                <li class="dropdown">
                    <button class="dropbtn" onclick="dropdownNav()">Watch</button>
                    <ul class="dropdown-content" id="myDropdown">
                        <li><a href="">Season 1</a></li>
                        <li><a href="">Season 2</a></li>
                    </ul>
                </li>
                <li>
                <?php
                if(isset($_SESSION['username'])){
                    echo "<a href='account.php' class='nav-account'>Account</a>";
                }else{
                    echo "<a href='login.php' class='nav-account'>Login</a>";
                }
                ?>
                </li>
            </ul>
        </nav>
        <div class="watch-section">
            <div class="watch-content" id="watch-content">
                <div class="watch-tools">
                    <a href="">All Episodes</a>
                    <a onclick="screenBrightness()"><img src="assets/icon/light-bulb.svg"> Turn off the light</a>
                    <a onclick="fullScreen();"><img src="assets/icon/expand.svg"> Expand</a>
                </div>
                <video controls>
                    <source src="https://drive.google.com/uc?export=download&id=1OFvWolWrqFX2McX8UqEN9EpK0ktSJ4UD" type="video/mp4">
                </video>
                <div class="watch-navigation">
                    <a href="">&lt;Previous</a>
                    <a href="">Next&gt;</a>
                </div>
                <div class="container-title"  id="container-title">
                    <img src="assets/images/jujutsu-kaisen-watch.jpg" class="img-title" alt="Jujutsu Kaisen">
                    <div class="watch-title">
                        <ul>
                            <li><h4>Watch <mark>Jujutsu Kaisen</mark> (TV) Episode 9 Subtitle Indonesia</h4></li>
                            <li></li>
                            <li><p class="watch-paragraph"><span>Synopsis:</span>Tells the story of Yuji Itadori who became a high school student because of an incident that doing  paranormal activities with an occult club. However, this relaxed lifestyle soon turns strange when he unknowingly discovers a cursed item. Yuuji finds himself suddenly thrust into a world of curses.</p></li>
                            <li>
                                <span class="watch-footer">
                                <span class="watch-mark">Starring: </span>
                                Junya Enoki, Yuma Uchida, Asami Seto
                                </span>
                            </li>
                            <li class="watch-download">Download Jujutsu Kaisen (TV)</li>
                            <li class="sub-download"><span>480p</span> <a href="">pixeldrain</a></li>
                            <li class="sub-download"><span>720p</span> <a href="">pixeldrain</a></li>
                            <li class="sub-download"><span>1080p</span> <a href="">pixeldrain</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Watch Sidebar -->
            <div class="watch-sidebar" id="watch-sidebar">
                <div class="sidebar-content">
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 1</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>24 January 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 2</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>26 January 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 3</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>28 January 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 4</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>3 February 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 5</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>7 February 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 6</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>11 February 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 7</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>14 February 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="assets/images/season-1.png">
                            <ul>
                                <li><h6>Jujutsu Kaisen Episode 8</h6></li>
                                <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                <li><p><span>Upload Date: </span>15 February 2023</p></li>
                            </ul>
                        </a>
                    </div>
                    <a href="" class="btn-watch">Watch More</a>
                </div>
            </div>
            <!-- Comment Section -->
            <div class="comment-section" id="comment-section">
                <div class="comment-content">
                    <h2><img src="assets/icon/jujutsu-kaisen-highschool.ico"> Forum Discussion</h2>
                    <p>The place to express your ideas, feelings, and emotions about the new film you are watching. Hope you enjoy watching!</p>
                    <div class="comment-items">
                        <img src="assets/images/characters/megumi-fushiguro.jpg">
                        <ul>
                            <li>
                                <h4>Megumi Fushiguro <span> on 24 October 2023</span></h4>
                            </li>
                            <li><p>This film is very exciting and makes me want to keep watching it, so it makes me addicted because it's too exciting, I hope there will be more films like this in the future! </p></li>
                        </ul>
                    </div>
                    <div class="comment-items">
                        <img src="assets/images/characters/yuji-itadori.jpg">
                        <ul>
                            <li>
                                <h4>Yuji Itadori <span> on 24 October 2023</span></h4>
                            </li>
                            <li><p>This film is very exciting and makes me want to keep watching it, so it makes me addicted because it's too exciting, I hope there will be more films like this in the future! </p></li>
                        </ul>
                    </div>
                    <div class="comment-items">
                        <img src="assets/images/characters/gojo-satoru.jpg">
                        <ul>
                            <li>
                                <h4>Gojo Satoru <span> on 24 October 2023</span></h4>
                            </li>
                            <li><p>This film is very exciting and makes me want to keep watching it, so it makes me addicted because it's too exciting, I hope there will be more films like this in the future! </p></li>
                        </ul>
                    </div>
                    <?php if (isset($_SESSION['username'])): ?>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                    <div class="input-comment">
                        <img src="assets/images/characters/suguru-geto.jpg">
                        <ul>
                            <li><span>Comment as</span> <?php echo $_SESSION['username']; ?></li>
                            <li><textarea name="comment" id="comment" required></textarea></li>
                            <li><input type="submit" name="submit" class="btn-comment">Comment</input></li>
                        </ul>
                    </div>
                    </form>
                    <?php endif; ?>
                </div>
            </div><br>
            <div class="footer" id="footer">
                &copy; Jujutsu Kaisen 2023. All rights reserved.
            </div>
        </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>