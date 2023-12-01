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
?>