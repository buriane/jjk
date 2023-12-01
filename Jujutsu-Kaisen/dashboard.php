<?php
    session_start();
    include 'connection.php';
    include 'functionArticles.php';

    $articles = getTopArticles();
    if(isset($_SESSION['username']) || isset($_SESSION['email'])){
        if($_SESSION['level'] != "Administrator"){
            header('Location:login.php?message=validate');
        }
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
            body{background-color: rgba(13, 13, 13, 1);}
        </style>
    </head>
    <body>
        <div class="dashboard-section">
            <div class="dashboard-navigation">
                <div class="dashboard-item">
                    <ul>
                        <a href="index.php"><li class="logo"><img src="assets/images/logo.png" alt="Logo Jujutsu Kaisen"></li></a>
                        <a href="dashboard.php?user-profiles"><li <?php if(isset($_GET['user-profiles'])){echo "class='active'";}?>>User Profiles</li></a>
                        <a href="dashboard.php?list-users"><li <?php if(isset($_GET['list-users'])){echo "class='active'";}?>>List Users</li></a>
                        <a href="dashboard.php?insert-article"><li <?php if(isset($_GET['insert-article'])){echo "class='active'";}?>>Insert Article</li></a>
                        <a href="dashboard.php?list-articles"><li <?php if(isset($_GET['list-articles'])){echo "class='active'";}?>>List Articles</li></a>
                        <a href="dashboard.php?insert-episode"><li <?php if(isset($_GET['insert-episode'])){echo "class='active'";}?>>Insert Episode</li></a>
                        <a href="dashboard.php?list-episodes"><li <?php if(isset($_GET['list-episodes'])){echo "class='active'";}?>>List Episodes</li></a>
                        <a href="dashboard.php?list-comments"><li <?php if(isset($_GET['list-comments'])){echo "class='active'";}?>>List Comments</li></a>
                        <a href="logout.php"><li class="logout">Logout</li></a>
                    </ul>
                </div>
            </div>
            <?php if(isset($_GET['user-profiles'])){
                include('user-profiles.php');
            }else if(isset($_GET['list-users'])){
                include('list-users.php');
            }else if(isset($_GET['insert-article'])){
                include('insert-article.php');
            }else if(isset($_GET['list-articles'])){
                include('list-articles.php');
            }else if(isset($_GET['insert-episode'])){
                include('insert-episode.php');
            }else if(isset($_GET['list-episodes'])){
                include('list-episodes.php');
            }else if(isset($_GET['list-comments'])){
                include('list-comments.php');
            }else{
                header('Location:dashboard.php?user-profiles');
            }
            ?>
        </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>