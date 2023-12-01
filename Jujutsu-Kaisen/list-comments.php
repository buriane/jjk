<?php
include('connection.php');
session_start();

$sql = "SELECT * FROM comment ORDER BY id_comment DESC";
$query = mysqli_query($conn, $sql);
if(!$query){
    echo "<script>alert('Query error!')</script>";
}
?>
<div class="dashboard-content">
    <h2>List Comments</h2>
    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="dashboard.php">List Comments</a></span>
    <div class="dashboard-item">
        <table>
            <tr>
                <th style="width:20%">Username</th>
                <th style="width:40%">Comment</th>
                <th style="width:20%">Episode ID</th>
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
                    <a href="delete.php?delete-comment=<?php echo $data[0];?>" class="delete" onclick="return confirm('Are you sure you want to delete this article?')"><img src="assets/icon/delete.svg" alt="Delete Button"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>  
</div>