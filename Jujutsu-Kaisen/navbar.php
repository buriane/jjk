<nav>
    <a href="index.php"><img src="assets/images/logo.png" class="logo" alt="Logo"></a>
    <ul>
        <li class="dropdown">
            <button class="dropbtn" onclick="dropdownNav()">Watch</button>
            <ul class="dropdown-content" id="myDropdown">
                <li><a href="season-one.php">Season 1</a></li>
                <li><a href="season-two.php">Season 2</a></li>
            </ul>
        </li>
        <li>
        <?php
        if(isset($_SESSION['username'])){
            if($_SESSION['level'] == "Administrator"){
                echo "<a href='dashboard.php' class='nav-account'>Dashboard</a>";
            }else if($_SESSION['level'] == "Member"){
                echo '<a style="text-decoration: none;" href="editProfile.php">' . $_SESSION['username'] . '</a>';
                if (isset($_SESSION['picture']) && file_exists('assets/images/profiles/' . $_SESSION['picture'])) {
                    echo '<img src="assets/images/profiles/' . $_SESSION['picture'] . '" alt="Profile Picture" width="200px" style="border-radius: 50%;">';
                } else {
                    echo '<img src="default.png" alt="Default Picture" width="200px" style="border-radius: 50%;">';
                }
            }
        }else{
            echo "<a href='login.php' class='nav-account'>Login</a>";
        }
        ?>
        </li>
    </ul>
</nav>