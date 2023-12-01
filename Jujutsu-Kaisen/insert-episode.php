<?php
include('connection.php');
session_start();

if(isset($_POST['insert-article'])){
    $episode_name = $_POST['episode-name'];
    $episode_name = $_POST['episode-name'];
    $episode_name = $_POST['episode-name'];
}

?>
<div class="dashboard-content">
    <h2>Insert Episode</h2>
    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="season-one.php">Insert Episode</a></span>
    <div class="dashboard-item">
        <form name="insert-episode" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="episode=name">Episode Name</label>
            <input type="text" name="episode-name" placeholder="Episode name here" required>
            <label for="text">Upload Type</label>
            <select name="season_id" required>
                <option value="">- Choose Upload Type -</option>
                <option value="1">Season 1</option>
                <option value="2">Season 2</option>
            </select>
            <input type="radio" name="episode-upload" value="Link" required> <span>Link</span>
            <input type="radio" name="episode-upload" value="File" required> <span>File</span>
            <label for="text">Episode Video</label>
            <input type="file" name="episode-file" required>
            <label for="text">Season</label>
            <select name="season_id" required>
                <option value="">- Choose Episode Season -</option>
                <option value="1">Season 1</option>
                <option value="2">Season 2</option>
            </select>
            <input type="submit" name="insert-article" value="Insert">
        </form>
    </div>
</div>