<?php
include "connection.php";

session_start();
if (!isset($_SESSION['username'])) {
    die('User not logged in');
}

$username = $_SESSION['username'];

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_array($result);

if (isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (password_verify($old_password, $user['password'])) {
        if ($new_password == $confirm_password) {
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $query = "UPDATE user SET password = '$new_password' WHERE username = '$username'";
            mysqli_query($conn, $query);
            echo "<script>alert('Password has been changed!'); document.location = 'index.php';</script>";
        } else {
            echo "<script>alert('New password and confirm password do not match!');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect!');</script>";
    }
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
        <style>
            .account-container{
                padding: 120px 20px;
            }
        </style>
</head>
<body>
<div class="account-container">
            <div class="account-section">
                <div class="account-content">
                    <form name="change-password" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2>User Profiles</h2>
                    <span><a href="index.php">Home</a> &gt; <a href="account.php">User Profiles</a> &gt; <a href="changePass.php">Change Password</a></span>
                    <label for="old_password">Current Password</label>
                    <input id="old_password" type="password" name="old_password" required>
                    <label for="new_password">New Password</label>
                    <input id="new_password" type="password" name="new_password" required>
                    <label for="confirm_password">Confirm New Password</label>
                    <input id="confirm_password" type="password" name="confirm_password" required><br>
                    <input type="submit" name="change_password" value="Change Password">
                </form>
                </div>
            </div>
        </form>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="old_password">Current Password</label>
        <input id="old_password" type="password" name="old_password" required><br>
        <label for="new_password">New Password</label>
        <input id="new_password" type="password" name="new_password" required><br>
        <label for="confirm_password">Confirm New Password</label>
        <input id="confirm_password" type="password" name="confirm_password" required><br>
        <input type="submit" name="change_password" value="Change Password">
    </form>
</body>
</html>