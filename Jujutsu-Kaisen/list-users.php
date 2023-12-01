<?php 
$sql = "SELECT * FROM user ORDER BY id DESC";
$query = mysqli_query($conn, $sql);
if(!$query){
    echo "<script>alert('Query error!')</script>";
}

?>
<div class="dashboard-content">
    <h2>List Users</h2>
    <span><a href="index.php">Home</a> &gt; <a href="dashboard.php">Dashboard</a> &gt; <a href="season-one.php">List Users</a></span>
    <div class="dashboard-item">
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Picture</th>
                <th>Tools</th>
            </tr>
            <?php 
            while($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $data['username'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['password'];?></td>
                <td><?php echo $data['picture'];?></td>
                <td>
                    <a href="update.php?update-user=<?php echo $data['id'];?>" class="update"><img src="assets/icon/edit.svg" alt="Edit Button"></a>
                    <a href="delete.php?delete-user=<?php echo $data['id'];?>" class="delete"><img src="assets/icon/delete.svg" alt="Delete Button"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>  
</div>