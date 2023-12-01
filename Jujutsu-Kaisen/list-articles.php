<?php
include('connection.php');
session_start();

$sql = "SELECT * FROM article ORDER BY article_release DESC";
$query = mysqli_query($conn, $sql);
if(!$query){
    echo "<script>alert('Query error!')</script>";
}
?>
<div class="dashboard-content">
    <h2>List Articles</h2>
    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="season-one.php">List Articles</a></span>
    <div class="dashboard-item">
        <table>
            <tr>
                <th style="width:20%">Article Name</th>
                <th style="width:40%">Article Content</th>
                <th style="width:20%">Article Image</th>
                <th style="width:20%">Tools</th>
            </tr>
            <?php 
            while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $data[1];?></td>
                <td><?php echo $data[2];?></td>
                <td>
                    <?php echo $data[3]; ?>
                </td>
                <td>
                    <a href="update.php?update-article=<?php echo $data[0];?>" class="update"><img src="assets/icon/edit.svg" alt="Edit Button"></a>
                    <a href="delete.php?delete-article=<?php echo $data[0];?>" class="delete" onclick="return confirm('Are you sure you want to delete this article?')"><img src="assets/icon/delete.svg" alt="Delete Button"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>  
</div>