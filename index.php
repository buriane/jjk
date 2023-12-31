<?php
    session_start();
    include 'functionArticle.php';

    $articles = getTopArticles();

    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div id="userProfile">
        <?php
        if (isset($_SESSION['picture']) && file_exists('uploads/' . $_SESSION['picture'])) {
            echo '<img src="uploads/' . $_SESSION['picture'] . '" alt="Profile Picture" width="200px">';
        } else {
            echo '<img src="default.png" alt="Default Picture" width="200px">';
        }
        ?>
        <h2><a style="text-decoration: none;" href="editProfile.php"><?php echo $_SESSION['username']; ?></a></h2>
        <p><?php echo $_SESSION['email']; ?></p>
    </div>
    <a href="logout.php">Logout</a>
    <br><br>
    <a href="addEps.php">Add Episode</a>
    <br><br>
    <a href="episode.php">List Episodes</a>
    <br><br>
    <a href="manageUser.php">User Management</a>
    <h1>Top Newest 3 Articles</h1>
    <?php while ($article = mysqli_fetch_array($articles)): ?>
        <h2><?php echo $article['article_name']; ?></h2>
        <?php echo date('F j, Y', strtotime($article['article_release'])); ?>
        <p><?php echo $article['article_content']; ?></p>
        <img src="<?php echo $article['article_image']; ?>" alt="article-img" width="200px">
        <br><br>
        <a href="article.php?id=<?php echo $article['id']; ?>">Read More</a>
        <hr>
    <?php endwhile; ?>
    <br><br>
    <a href="allArticles.php">View All</a>
</body>
</html>