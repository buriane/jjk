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
        <?php if(isset($_GET['update-user'])){
            include('update-user.php');
        }else if(isset($_GET['update-article'])){
            include('update-article.php');
        }else if(isset($GET['update-episode'])){
            include('update-episode.php');
        }
        ?>
        <script src="assets/js/script.js"></script>
    </body>
</html>