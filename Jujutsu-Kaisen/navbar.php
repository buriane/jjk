<nav id="navigation-bar">
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
                echo "<a href='account.php' class='nav-account'>Account</a>";

            }
        }else{
            echo "<a href='login.php' class='nav-account'>Login</a>";
        }
        ?>
        </li>
    </ul>
</nav>