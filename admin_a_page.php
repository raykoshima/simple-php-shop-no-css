<?php include("header.php");
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check
?>

<center><h1>Admin</h1></center>
<?php 
    $sql = "SELECT * FROM login WHERE login_id != '1' AND login_id != '".$_SESSION["UserID"]."'"; // ไม่ให้แสดงข้อมูลของ admin 1 และตัวเอง
    $result = $con->query($sql);

?>
<h1><center>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Lastname</th>
        <th>Username</th>
        <th>Passoword</th>
        <th>Level</th>
    </tr>

    
<?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row["login_id"];?></td>
        <td><?php echo $row["login_name"];?></td>
        <td><?php echo $row["login_lastname"];?></td>
        <td><?php echo $row["login_user"];?></td>
        <td><?php echo $row["login_password"];?></td>
        <td><?php echo $row["login_level"];?></td>
        <td><a href="admin_edit.php?ID=<?php echo $row["login_id"]; ?>"><button type="button" class="btn btn-warning">Edit</button></a></td>
        <td><a href="admin_delete.php?ID=<?php echo $row["login_id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
    </tr>
<?php endwhile ?>
<td><a button type="button" class="btn btn-success" href="admin_form_insert.php">INSERT</a></td>
</table>
</center></h1>
<?php } else {
echo "<script type='text/javascript'>";
echo "alert('You are not admin');";
echo "history.back()";
echo "</script>";
}
?>



</body>
</html>