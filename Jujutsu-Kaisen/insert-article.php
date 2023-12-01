<?php 
include('connection.php'); 
session_start();

if(isset($_POST['insert-article'])){
    $article_title  = $_POST['article-title'];
    $article_content = $_POST['article-content'];
    $uploaddir  = 'assets/images/articles/';
    $uploadname = $_FILES['article-image']['name'];
    $uploadtmp = $_FILES['article-image']['tmp_name'];
    $nameuploaded = $article_title . "_" . $uploadname;

    move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
    $sql = "INSERT INTO article (article_name, article_content, article_image, article_release) VALUES ('$article_title', '$article_content', '$nameuploaded', CURRENT_TIMESTAMP())";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('Article has been added!');window.location.href = 'dashboard.php?insert-article'</script>";
    }
}
?>


<div class="dashboard-content">
    <h2>Insert Article</h2>
    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="season-one.php">Insert Article</a></span>
    <div class="dashboard-item">
        <form name="insert-article" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <label for="username">Article Title</label>
            <input type="text" name="article-title" placeholder="Article title here" required>
            <label for="text">Article Content</label>
            <textarea name="article-content" cols="30" rows="10" placeholder="Article content here" required></textarea>
            <label for="text">Article Image</label>
            <input type="file" name="article-image" required>
            <input type="submit" name="insert-article" value="Insert">
        </form>
    </div>
</div>