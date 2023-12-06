<?php 
include('connection.php');
session_start();

$old_username = $_SESSION['username'];
$email = $_SESSION['email'];

if(isset($_POST['change-profile'])){
    $username = $_POST['username'];
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
                $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$old_username'");
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
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                echo "<script>alert('Update user success!'); window.location.href = 'dashboard.php?list-users'</script>";
            }else{
                echo "<script>alert('Failed update user!'); window.location.href = 'dashboard.php?list-users'</script>";
            }
        }else{
            echo "<script>alert('Username already taken!'); window.location.href = 'dashboard.php?user-profiles'</script>";
        }
    }else{
        if($_FILES['picture']['name'] != ""){
            $uploaddir      = 'assets/images/profiles/';
            $uploadname     = $_FILES['picture']['name'];
            $uploadtmp      = $_FILES['picture']['tmp_name'];
            $nameuploaded   = $username . "_" . $uploadname;
            $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$old_username'");
            $row    = mysqli_fetch_array($query);
            if(file_exists($uploaddir . $row['picture'])){
                unlink($uploaddir . $row['picture']);
                move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
            }else{
                move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
            }
            $sql = "UPDATE user SET username = '$username', email = '$email', picture = '$nameuploaded' WHERE username = '$old_username'";
        }else{
            $sql = "UPDATE user SET username = '$username', email = '$email' WHERE username = '$old_username'";
        }
        $query = mysqli_query($conn, $sql);
        if($query){
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            echo "<script>alert('Update profile success!'); window.location.href = 'dashboard.php?user-profiles'</script>";
        }else{
            echo "<script>alert('Failed update profile!'); window.location.href = 'dashboard.php?user-profiles'</script>";
        }
    }
}

$select = "SELECT * FROM user WHERE username = '$old_username'";
$query = mysqli_query($conn, $select);
$data = mysqli_fetch_array($query);
?>
<div class="dashboard-content">
    <h2>Admin Profiles</h2>
    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="season-one.php">Admin Profiles</a></span>
    <div class="dashboard-item">
        <form name="change-profiles" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <img src="assets/images/profiles/<?php echo $data['picture'];?>">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Your username here" value="<?php echo $data['username'];?>" required>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Your email here" value="<?php echo $data['email'];?>" required>
        </form>
    </div>
</div>
