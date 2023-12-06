<?php
    include "connection.php";
    session_start();

    if (isset($_POST['submit'])) {
        $comment = $_POST['comment'];
        $user = $_SESSION['username'];
        $id = $_GET['id-episode'];
        $query = "INSERT INTO comment (username, comment, id_episode) VALUES ('$user', '$comment', '$id')";
        mysqli_query($conn, $query);
        if($query){
            echo "<script>alert('Successfully add comment!');window.location.href = watch.php?id-episode=$id</script>";
        }
    }
    
    $editing = false;
    $edit_comment = '';
    if (isset($_POST['edit'])) {
        $editing = true;
        $id_comment = $_POST['id_comment'];
        $result = mysqli_query($conn, "SELECT comment FROM comment WHERE id_comment = $id_comment");
        $row = mysqli_fetch_array($result);
        $edit_comment = $row['comment'];
    }
    
    if (isset($_POST['update'])) {
        $id_comment = $_POST['id_comment'];
        $comment = $_POST['edited_comment'];
        $query = "UPDATE comment SET comment = '$comment' WHERE id_comment = $id_comment";
        mysqli_query($conn, $query);
        $editing = false;
    }
    
    if (isset($_POST['delete'])) {
        $id_comment = $_POST['id_comment'];
        $query = "DELETE FROM comment WHERE id_comment = $id_comment";
        mysqli_query($conn, $query);
    }

    if($_GET['id_episode']){
        $id_episode = $_GET['id_episode'];


    }
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
            .footer{background-color: transparent;}
            .btn-editcomment{
                border: none;
                padding: 2px 6px;
                border-radius: 6px;
                margin: 4px;
                display: inline-block;
                background-color: #445d48;
                color: white;
                -webkit-transition: 0.2s;
                transition: 0.2s;
            }
            .btn-editcomment:hover{
                color: #767676;
                background-color: #28372b;
            }
            .btn-delcomment{
                display: inline-block;
                border: none;
                padding: 2px 6px;
                border-radius: 6px;
                margin: 4px;
                background-color: #c70039;
                color: white;
                -webkit-transition: 0.2s;
                transition: 0.2s;
            }
            .btn-delcomment:hover{
                color: #767676;
                background-color: #910029;
            }
            .textarea-comment{
                border-radius: 4px;
                max-width: 500px;
                min-height: 100px;
                max-height: 200px;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <?php include("navbar.php");?>
        <div class="watch-section">
            <div class="watch-content" id="watch-content">
                <div class="watch-tools">
                    <?php
                    $id = $_GET['id-episode'];  
                    $sql = "SELECT * FROM episode JOIN season ON episode.id_season = season.id_season WHERE id_episode = '$id'";
                    $query = mysqli_query($conn, $sql);
                    $season = mysqli_fetch_assoc($query);
                    if($season['id_season'] == 1){
                    ?>
                    <a href="season-one.php">All Episodes</a>
                    <?php }else{?>
                    <a href="season-two.php">All Episodes</a>
                    <?php }?>
                    <a onclick="screenBrightness()" id="screen-brightness"><img src="assets/icon/light-bulb.svg"> Turn off the light</a>
                    <a onclick="fullScreen();" id="screen-size"><img src="assets/icon/expand.svg"> Expand</a>
                </div>
                <video controls>
                    <?php 
                    $sql = "SELECT * FROM episode JOIN season ON episode.id_season = season.id_season WHERE id_episode = '$id'";
                    $query = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_array($query); 
                    
                    if($data['status'] == "Link"){?>
                        <source src="https://drive.google.com/uc?export=download&id=<?php echo $data['file'];?>" type="video/mp4">
                    <?php
                    }else if($data['status'] == "File"){?>
                        <source src="assets/videos/<?php echo $data['file'];?>" type="video/mp4">
                    <?php } ?>
                </video>
                <div class="watch-navigation">
                    <?php 
                        $current_episode = $data['id_episode'];
                        $current_season = $data['id_season'];

                        $result_max = mysqli_query($conn, "SELECT MAX(id_episode) AS max_episode FROM episode WHERE id_season = $current_season");
                        $row_max = mysqli_fetch_array($result_max);
                        $max_episode = $row_max['max_episode'];

                        $result_min = mysqli_query($conn, "SELECT MIN(id_episode) AS min_episode FROM episode WHERE id_season = $current_season");
                        $row_min = mysqli_fetch_array($result_min);
                        $min_episode = $row_min['min_episode'];

                        $previous = max($min_episode, $current_episode - 1);
                        $next = $current_episode < $max_episode ? $current_episode + 1 : $current_episode;
                    ?>
                    <?php if ($current_episode > $min_episode): ?>
                        <a href="watch.php?id-episode=<?php echo $previous;?>&id_season=<?php echo $current_season;?>">&lt;Previous</a>
                    <?php endif; ?>
                    <?php if ($current_episode < $max_episode): ?>
                        <a href="watch.php?id-episode=<?php echo $next;?>&id_season=<?php echo $current_season;?>">Next&gt;</a>
                    <?php endif; ?>
                </div>
                <div class="container-title"  id="container-title">
                    <?php 

                    if($season['id_season'] == 1){
                    ?>
                    <img src="assets/images/jujutsu-kaisen-watch.jpg" class="img-title" alt="Jujutsu Kaisen">
                    <div class="watch-title">
                        <ul>
                            <li><h4>Watch <mark>Jujutsu Kaisen</mark> (TV) <?php echo $data['episode'];?> Subtitle Indonesia</h4></li>
                            <li></li>
                            <li><p class="watch-paragraph"><span>Synopsis:</span>Tells the story of Yuji Itadori who became a high school student because of an incident that doing  paranormal activities with an occult club. However, this relaxed lifestyle soon turns strange when he unknowingly discovers a cursed item. Yuuji finds himself suddenly thrust into a world of curses.</p></li>
                            <li>
                                <span class="watch-footer">
                                <span class="watch-mark">Starring: </span>
                                Junya Enoki, Yuma Uchida, Asami Seto
                                </span>
                            </li>
                            <li class="watch-download">Download Jujutsu Kaisen (TV)</li>
                            <li class="sub-download"><span>480p</span> <a href="#">pixeldrain</a></li>
                            <li class="sub-download"><span>720p</span> <a href="#">pixeldrain</a></li>
                            <li class="sub-download"><span>1080p</span> <a href="#">pixeldrain</a></li>
                        </ul>
                    </div>
                    <?php } else{ ?>
                        <img src="assets/images/season-2.png" class="img-title" alt="Jujutsu Kaisen">
                        <div class="watch-title">
                        <ul>
                            <li><h4>Watch <mark>Jujutsu Kaisen</mark> Season 2 <?php echo $data['episode'];?> Subtitle Indonesia</h4></li>
                            <li></li>
                            <li><p class="watch-paragraph"><span>Synopsis:</span>The second season of Jujutsu Kaisen will tell about Gojo's past and the Shibuya Incident Arc. Gojo Satoru's past began 11 years before Yuji Itadori entered Tokyo Jujutsu High School.</p></li>
                            <li>
                                <span class="watch-footer">
                                <span class="watch-mark">Starring: </span>
                                Junya Enoki, Yuma Uchida, Asami Seto
                                </span>
                            </li>
                            <li class="watch-download">Download Jujutsu Kaisen (TV)</li>
                            <li class="sub-download"><span>480p</span> <a href="#">pixeldrain</a></li>
                            <li class="sub-download"><span>720p</span> <a href="#">pixeldrain</a></li>
                            <li class="sub-download"><span>1080p</span> <a href="#">pixeldrain</a></li>
                        </ul>
                    </div>
                    <?php }?>
                </div>
            </div>
            <!-- Watch Sidebar -->
            <div class="watch-sidebar" id="watch-sidebar">
                <div class="sidebar-content">
                    <?php
                    
                    if($season['id_season'] == 1){
                        $sql = "SELECT * FROM episode JOIN season ON episode.id_season = season.id_season WHERE episode.id_season = 1 ORDER BY id_episode ASC";
                        $query = mysqli_query($conn, $sql);
                        while($data = mysqli_fetch_assoc($query)){ ?>
                        <div class="item">
                            <a href="watch.php?id-episode=<?php echo $data['id_episode'];?>">
                                <img src="assets/images/season-1.png">
                                <ul>
                                    <li><h6>Jujutsu Kaisen <?php echo $data['episode'];?></h6></li>
                                    <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                    <li><p><span>Upload Date: </span><?php echo date('F d, Y', strtotime($data['file_uploaded']));?></p></li>
                                </ul>
                            </a>
                        </div>
                    <?php } 
                    }else{ 
                        $sql = "SELECT * FROM episode JOIN season ON episode.id_season = season.id_season WHERE episode.id_season = 2 ORDER BY id_episode ASC";
                        $query = mysqli_query($conn, $sql);
                        while($data = mysqli_fetch_assoc($query)){ 
                        ?>
                        <div class="item">
                            <a href="watch.php?id-episode=<?php echo $data['id_episode'];?>">
                                <img src="assets/images/season-2.png">
                                <ul>
                                    <li><h6>Jujutsu Kaisen <?php echo $data['episode'];?></h6></li>
                                    <li><p><span>Genre: </span>Action, Demons, Horror, School, Shounen, Supernatural</p></li>
                                    <li><p><span>Upload Date: </span><?php echo date('F d, Y', strtotime($data['file_uploaded']));?></p></li>
                                </ul>
                            </a>
                        </div>
                    <?php }
                    }
                    if($season['id_season'] == 1){ ?>
                    <a href="season-one.php" class="btn-watch">Watch More</a>
                    <?php }else if($season['id_season'] == 2){ ?>
                    <a href="season-two.php" class="btn-watch">Watch More</a>
                    <?php } ?> ?>
                </div>
            </div>
            <!-- Comment Section -->
            <div class="comment-section" id="comment-section">
                <div class="comment-content">
                    <h2><img src="assets/icon/jujutsu-kaisen-highschool.ico"> Forum Discussion</h2>
                    <p>The place to express your ideas, feelings, and emotions about the new film you are watching. Hope you enjoy watching!</p>
                    
                    <?php
                    $result = mysqli_query($conn, "SELECT comment.*, user.picture FROM comment JOIN user ON comment.username = user.username WHERE id_episode = '$id' ORDER BY id_comment DESC");
                    while ($row = mysqli_fetch_array($result)):
                    ?>
                        <div class="comment-items">
                        <?php if ($_SESSION['username'] == $row['username']): ?>
                            <img src="assets/images/profiles/<?php echo $_SESSION['picture']; ?>">
                            <ul>
                                <li>
                                    <h4><?php echo $row['username']; ?></h4>
                                </li>
                                <li><p id="comment-<?php echo $row['id_comment']; ?>"><?php echo $row['comment']; ?></p></li>
                                <?php if ($_SESSION['username'] == $row['username']): ?>
                                    <li>
                                        <?php if ($editing && $_POST['id_comment'] == $row['id_comment']): ?>
                                            <!-- Form for editing comment -->
                                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                                                <textarea name="edited_comment" class="textarea-comment"><?php echo $row['comment']; ?></textarea>
                                                <input type="hidden" name="id_comment" value="<?php echo $row['id_comment']; ?>">
                                                <br><input type="submit" name="update" value="Save Edit" class="btn-editcomment">
                                            </form>
                                        <?php else: ?>
                                            <!-- Form for initiating edit -->
                                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                                                <input type="hidden" name="id_comment" value="<?php echo $row['id_comment']; ?>">
                                                <input type="submit" name="edit" value="Edit" class="btn-editcomment">
                                            </form>
                                        <?php endif; ?>
                                        <!-- Form for deleting comment -->
                                        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                                            <input type="hidden" name="id_comment" value="<?php echo $row['id_comment']; ?>">
                                            <input type="submit" name="delete" value="Delete" class="btn-delcomment">
                                        </form>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php else: ?>
                            <img src="assets/images/profiles/<?php echo $row['picture']; ?>">
                            <ul>
                                <li>
                                    <h4><?php echo $row['username']; ?></h4>
                                </li>
                                <li><p id="comment-<?php echo $row['id_comment']; ?>"><?php echo $row['comment']; ?></p></li>
                            </ul>
                        <?php endif; ?>
                        </div>
                    <?php endwhile; ?>

                    <?php if (isset($_SESSION['username'])){ ?>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                    <div class="input-comment">
                        <img src="assets/images/profiles/<?php echo $_SESSION['picture']; ?>">
                        <ul>
                            <li><span>Comment as</span> <?php echo $_SESSION['username']; ?></li>
                            <li><textarea name="comment" id="comment" required></textarea></li>
                            <li><input type="submit" name="submit" class="btn-comment" value="Comment"></li>
                        </ul>
                    </div>
                    </form>
                    <?php } else{ ?>
                        <div class="input-comment">
                        <img src="assets/images/profiles/admin_account.png">
                        <ul>
                            <li><span>You must <a href="login.php" style="text-decoration:none">Login</a> first!</span> </li>
                            <li><textarea name="comment" id="comment" readonly>You must login first before comment!</textarea></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>

            </div><br>
        </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>