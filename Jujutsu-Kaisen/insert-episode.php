<?php
include('connection.php');
session_start();

if(isset($_POST['insert-episode'])){
    $episode_name = $_POST['episode-name'];
    $season_id = $_POST['season_id'];
    $status = $_POST['status'];

    if ($status === 'File') {
        $file = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
        $path = "videos/".$file;
        $uploaded = date('Y-m-d H:i:s');

        if (move_uploaded_file($tmp, $path)) {
            $query = "INSERT INTO episode (episode, file, file_uploaded, status) VALUES ('$episode', '$path', '$uploaded', '$status')";
            mysqli_query($conn, $query);
            echo "<script>alert('Episode has been uploaded!');</script>";
            header("Location: episode.php");
        } else {
            echo "<script>alert('Failed to upload episode.');</script>";
        }
    } elseif ($status === 'Link') {
        // Handle link submission
        $link = $_POST['link'];
        $uploaded = date('Y-m-d H:i:s');
        $query = "INSERT INTO episode (episode, file, file_uploaded, status) VALUES ('$episode', '$link', '$uploaded', '$status')";
        mysqli_query($conn, $query);
        echo "<script>alert('Episode has been uploaded!');</script>";
        header("Location: episode.php");
    }
}

?>
<div class="dashboard-content">
    <h2>Insert Episode</h2>
    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="season-one.php">Insert Episode</a></span>
    <div class="dashboard-item">
        <form name="insert-episode" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="episode=name">Episode Name</label>
            <input type="text" name="episode-name" placeholder="Episode name here" required>
            <label for="status">Upload type</label>
            <select id="status" name="status" onchange="toggleInput()" required>
                <option value="File">File</option>
                <option value="Link">Link</option>
            </select>
            <div id="fileInput">
            <label for="file">File:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <div id="linkInput" style="display: none;">
                <label for="link">Link:</label>
                <input type="text" id="link" name="link">
            </div>
            <label for="text">Season</label>
            <select name="season_id" required>
                <option value="" selected>- Choose Episode Season -</option>
                <option value="1">Season 1</option>
                <option value="2">Season 2</option>
            </select>
            <input type="submit" name="insert-episode" value="Insert">
        </form>
    </div>
</div>