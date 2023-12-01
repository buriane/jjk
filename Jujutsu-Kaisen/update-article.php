<?php
include('connection.php');
session_start();

$id = $_GET['update-article'];
$sql = "SELECT * FROM article WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if(isset($_POST['update-article'])){
    $article_title  = $_POST['article-title'];
    $article_content= $_POST['article-content'];
    
    if($_FILES['article-image']['name'] != ""){
        $uploaddir      = 'assets/images/articles/';
        $uploadname     = $_FILES['article-image']['name'];
        $uploadtmp      = $_FILES['article-image']['tmp_name'];
        $nameuploaded   = $article_title . "_" . $uploadname;
        $query = mysqli_query($conn, "SELECT * FROM article WHERE id = '$id'");
        $row    = mysqli_fetch_array($query);
        if(file_exists($uploaddir . $row['article_image'])){
            unlink($uploaddir . $row['article_image']);
            move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
        }else{
            move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
        }

        $sql = "UPDATE article SET article_name = '$article_title', article_content = '$article_content', article_image = '$nameuploaded' WHERE id = '$id'";
    }else{
        $sql = "UPDATE article SET article_name = '$article_title', article_content = '$article_content' WHERE id = '$id'";
    }

    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('Update article success!'); window.location.href = 'dashboard.php?list-articles'</script>";
    }else{
        echo "<script>alert('Failed update article!'); window.location.href = 'dashboard.php?list-articles'</script>";
    }
}
?>
<div class="update-section">
    <div class="update-content">
        <div class="update-title">
            <h2><a href="dashboard.php?list-articles">&lt;</a> Update Article</h2>
            <span><a href="index.php">Home</a> &gt; <a href="dashboard.php?list-articles">Dashboard</a> &gt; <a href="update.php?update-article=<?php echo $data['id'];?>">Update Article</a></span>
        </div>
        <div class="update-item">
        <form name="update-article" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="article-id" value="<?php echo $data['article_id'];?>">
            <label for="article-title">Article Name</label>
            <input type="text" name="article-title" placeholder="Put article name here" value="<?php echo $data['article_name']; ?>" required>
            <label for="email">Article Content</label>
            <textarea name="article-content" id="" cols="30" rows="10"><?php echo $data['article_content']; ?></textarea>
            <img src="assets/images/articles/<?php echo $data['article_image']; ?>">
            <label for="password">Article Image</label>
            <input type="file" name="article-image">
            <input type="submit" name="update-article" value="Update">
        </form>
        </div>
    </div>
</div>