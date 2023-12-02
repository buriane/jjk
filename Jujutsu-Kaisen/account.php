<?php
include "connection.php";

session_start();
if (!isset($_SESSION['username'])) {
    die('User not logged in');
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
        <title>Jujutsu Kaisen - Shibuya Incident</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="icon" href="assets/icon/jujutsu-kaisen-highschool.ico"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav id="navigation-bar">
        <a></a>
        <ul>
            <li style="padding:28px 8px">
            <?php
            if(isset($_SESSION['username'])){
                if($_SESSION['level'] == "Administrator"){
                    echo "<a href='dashboard.php' class='nav-account'>Dashboard</a>";
                }else if($_SESSION['level'] == "Member"){
                    echo "<a href='logout.php' class='nav-account'>Logout</a>";

                }
            }else{
                header('Location:login.php?message=validate');
            }
            ?>
            </li>
        </ul>
    </nav>
    <div class="account-container">
        <div class="profile-section">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="profile-content">
                <?php if (file_exists('assets/images/profiles/' . $user['picture'])): ?>
                <img id="profilePic" src="assets/images/profiles/<?php echo $user['picture']; ?>" alt="Profile Picture" width="200px"/><br>
                <?php else: ?>
                    <img id="profilePic" src="assets/images/profiles/admin_account.png" alt="Profile Picture" width="200px"/><br>
                <?php endif; ?>
                <div class="input-container">
                    <label id="label-picture" for="picture">+</label>
                    <input type="file" id="picture" accept="image/jpeg, image/jpg, image/png"/>
                </div>
                <input id="picture" type="file" name="picture"><br>
            </div>
            </div>
            <div class="account-section">
                <div class="account-content">
                    <h2>User Profiles</h2>
                    <span><a href="index.php">Home</a> &gt; <a href="account.php">User Profiles</a></span>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" value="<?php echo $user['username']; ?>" required readonly><br>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
                    <input type="submit" name="update" value="Update">
                    <a href="changePass.php" class="change-password">Change Password</a>
                </div>
            </div>
        </form>
    </div>
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