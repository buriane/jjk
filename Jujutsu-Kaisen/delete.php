<?php
include('connection.php');
session_start();

if (isset($_GET['delete-user'])) {
    $id = $_GET['delete-user'];
    $query = "DELETE FROM user WHERE id = $id";
    mysqli_query($conn, $query);
    if($query){
        echo "<script>alert('Successfully delete data user!');window.location.href = 'dashboard.php?list-users'</script>";
    }else{
        echo "<script>alert('Error! cannot delete data user');window.location.href = 'dashboard.php?list-users'</script>";
    }
}

if (isset($_GET['delete-article'])) {
    $id = $_GET['delete-article'];
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM article WHERE id = '$id'"));
    $filefoto = $row['article_image'];
    unlink($filefoto);
    $delete = "DELETE FROM article WHERE id = '$id'";
    $query = mysqli_query($conn, $delete);
    
    if ($query) {
        echo "<script>alert('Article has been deleted!'); document.location = 'dashboard.php?list-articles';</script>";
    }
}
?>