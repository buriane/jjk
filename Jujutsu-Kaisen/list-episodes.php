<?php
include "connection.php";

$result = mysqli_query($conn, "SELECT * FROM episode ORDER BY id_episode DESC");

if (isset($_POST['delete'])) {
    $id_episode = $_POST['id_episode'];
    $query = "DELETE FROM episode WHERE id_episode = $id_episode";
    mysqli_query($conn, $query);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Episode</title>
</head>
<body>
    <div class="dashboard-content">
        <h2>List Episodes</h2>
        <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="season-one.php">List Episodes</a></span>
        <div class="dashboard-item">
            <table>
                <tr>
                    <th style="width:20%">Episode Name</th>
                    <th style="width:20%">Source</th>
                    <th style="width:20%">Uploaded</th>
                    <th style="width:20%">Season</th>
                    <th style="width:20%">Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?php echo $row['episode']; ?></td>
                    <td><?php echo $row['file']; ?></td>
                    <td><?php echo date('F j, Y', strtotime($row['file_uploaded'])); ?></td>
                    <td><?php echo $row['id_season'] ?></td>
                    <td>
                        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this episode?')">
                            <input type="hidden" name="id_episode" value="<?php echo $row['id_episode']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                <?php endwhile; ?>
                </tr>
            </table>
        </div>  
    </div>
</body>
</html>