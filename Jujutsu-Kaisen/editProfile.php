<?php
include "connection.php";

session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php?message=validate');
}


$username = $_SESSION['username'];

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
    $new_username = $_POST['username'];
    $email = $_POST['email'];

    if ($_FILES['picture']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['picture']['tmp_name'];
        $name = $_FILES['picture']['name'];
        move_uploaded_file($tmp_name, "assets/images/profiles/$name");
    
        $query = "UPDATE user SET username = '$new_username', email = '$email', picture = '$name' WHERE username = '$username'";
    } else {
        $query = "UPDATE user SET username = '$new_username', email = '$email', picture = NULL WHERE username = '$username'";
        $_SESSION['picture'] = null;
    }
    
    mysqli_query($conn, $query);
    $_SESSION['username'] = $new_username;
    $_SESSION['email'] = $email;
    $_SESSION['picture'] = $name;
    echo "<script>alert('Profile has been updated!'); document.location = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="picture">Profile Picture</label><br>
        <?php if (file_exists('assets/images/profiles/' . $user['picture'])): ?>
            <img id="profilePic" src="assets/images/profiles/<?php echo $user['picture']; ?>" alt="Profile Picture" width="200px"/><br>
        <?php else: ?>
            <img id="profilePic" src="default.png" alt="Profile Picture" width="200px"/><br>
        <?php endif; ?>
        <input id="picture" type="file" name="picture"><br>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="<?php echo $user['username']; ?>" required readonly><br>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
    <a href="changePass.php">Change Password</a>
    <br><br>
    <a href="logout.php">Logout</a>

    <script>
        document.getElementById('picture').addEventListener('change', function(e) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('profilePic').src = e.target.result;
            }

            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
</body>
</html>