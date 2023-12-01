<?php
include('connection.php');
session_start();

$id = $_GET['update-user'];

if(isset($_POST['update-user'])){
    $username  = $_POST['username'];
    $old_username = $_SESSION['username'];
    $email = $_POST['email'];
    
    $select = "SELECT * FROM user WHERE username = '$username'";
    $execute = mysqli_query($conn, $select);
    if(mysqli_num_rows($execute) > 0){
        if($username == $old_username){
            if($_FILES['picture']['name'] != ""){
                $uploaddir      = 'assets/images/profiles/';
                $uploadname     = $_FILES['picture']['name'];
                $uploadtmp      = $_FILES['picture']['tmp_name'];
                $nameuploaded   = $username . "_" . $uploadname;
                $query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
                $row    = mysqli_fetch_array($query);
                if(file_exists($uploaddir . $row['picture'])){
                    unlink($uploaddir . $row['picture']);
                    move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
                }else{
                    move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
                }
        
                $sql = "UPDATE user SET username = '$old_username', email = '$email', picture = '$nameuploaded' WHERE id = '$id'";
            }else{
                $sql = "UPDATE user SET username = '$old_username', email = '$email' WHERE id = '$id'";
            }
            $query = mysqli_query($conn, $sql);
            if($query){
                echo "<script>alert('Update user success!'); window.location.href = 'dashboard.php?list-users'</script>";
            }else{
                echo "<script>alert('Failed update user!'); window.location.href = 'dashboard.php?list-users'</script>";
            }
        }else{
            echo "<script>alert('Username has been taken!'); window.location.href = 'dashboard.php?list-users'</script>";
        }
    }else{
        if($_FILES['picture']['name'] != ""){
            $uploaddir      = 'assets/images/profiles/';
            $uploadname     = $_FILES['picture']['name'];
            $uploadtmp      = $_FILES['picture']['tmp_name'];
            $nameuploaded   = $username . "_" . $uploadname;
            $query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
            $row    = mysqli_fetch_array($query);
            if(file_exists($uploaddir . $row['picture'])){
                unlink($uploaddir . $row['picture']);
                move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
            }else{
                move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
            }
    
            $sql = "UPDATE user SET username = '$username', email = '$email', picture = '$nameuploaded' WHERE id = '$id'";
        }else{
            $sql = "UPDATE user SET username = '$username', email = '$email' WHERE id = '$id'";
        }
        $query = mysqli_query($conn, $sql);
        if($query){
            echo "<script>alert('Update user success!'); window.location.href = 'dashboard.php?list-users'</script>";
        }else{
            echo "<script>alert('Failed update user!'); window.location.href = 'dashboard.php?list-users'</script>";
        }
    }
}
$sql = "SELECT * FROM user WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
?>
        <div class="update-section">
            <div class="update-content">
                <div class="update-title">
                    <h2><a href="dashboard.php?list-users">&lt;</a> Update User</h2>
                    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php?list-users">Dashboard</a> &gt; <a href="update-user.php?id=<?php echo $data['id'];?>">Update User</a></span>
                </div>
                <div class="update-item">
                <form name="update-user" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Put username here" value="<?php echo $data['username']; ?>" required>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Put email here" value="<?php echo $data['email']; ?>" required>
                    <img src="assets/images/profiles/<?php echo $data['picture']; ?>">
                    <label for="picture">Picture</label>
                    <input type="file" name="picture">
                    <input type="submit" name="update-user" value="Update">
                </form>
                </div>
            </div>
        </div>