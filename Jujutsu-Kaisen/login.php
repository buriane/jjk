<?php
    include "connection.php";
    session_start();

    if(isset($_SESSION['username']) || isset($_SESSION['email'])){
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordError = false;

        $sql = "SELECT * FROM user WHERE username='$username'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_array($query);
            if (password_verify($password, $row['password'])){
                if($row['level'] == "Administrator"){
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['level'] = "Administrator";
                    $_SESSION['picture'] = $row['picture'];
                    header('Location: dashboard.php');
                    exit;
                }else if($row['level'] == "Member"){
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['level'] = "Member";
                    $_SESSION['picture'] = $row['picture'];
                    header('Location: dashboard.php');
                    exit;
                }
            }else{
                $passwordError = true;
                header('Location:login.php?message=failure');
            }
        }else{
            header('Location:login.php?message=failure');
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
            body{background-color: rgba(13, 13, 13);}
        </style>
    </head>
    <body>
        <div class="login-container">
            <h1><a href="index.php"><img src="assets/icon/arrow-left-solid.svg" class="arrow-login"></a> Login Account</h1>
            <div class="account-content">
                <?php
                if($_GET['message'] == "failure"){
                    echo "<div class='login-notification' id='login-notification'><span>Username or password is incorrect!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }else if($_GET['message'] == "registered"){
                    echo "<div class='login-notification' id='login-notification'><span>You have successfully registered!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }else if($_GET['message'] == "validate"){
                    echo "<div class='login-notification' id='login-notification'><span>You must login first!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }else if($_GET['message'] == "logout"){
                    echo "<div class='login-notification' id='login-notification'><span>You have successfully logged out!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }
                ?>
                <form name="login-form" class="account-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                    <span>Don't have an account? <a href="register.php"> Sign up</a></span>
                    <input type="submit" name="submit" value="Login" class="login-button">
                </form>
            </div>
        </div>
        <script src="assets/js/script.js"></script>
    </body>
</html>