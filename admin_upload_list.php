<?php include("header.php"); 
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check
?>
          
<?php
$query = "SELECT * FROM uploadfile" ; 
$result = mysqli_query($con, $query); 




?><br><br>
<center><H3>แก้ไขสินค้า</H3></center>
<br><br><br>
<div class="container"><a button type="button" class="btn btn-success" href="admin_upload_form.php">UPLOAD</a><br><br>
                    <table  class="table table-dark table-striped">

                    <tr align='center' bgcolor='blue'>
                              <td>รหัสสินค้า</td>
                              <td>รูปภาพ</td>
                              <td>เวลาที่อัพโหลด</td>
                              <td>ชื่อสินค้า</td>
                              <td>ประเภทสินค้า</td>
                              <td>ราคา</td>
                              <td>คงเหลือ</td>
                              <td></td>
                              <td></td>
                    </tr>
                    <?php
                    while($row = mysqli_fetch_array($result)) 
                    { 
                    ?>

                    <tr >
                              <td ><?php echo "" .$row["fileID"] . "";  ?></td> 
                              <td><?php echo "" ."<img src='fileupload/".$row["fileupload"]."'  width='100'>".""; ?></td>
                              <td> <?php echo "" .$row["dateup"] . "";  ?></td> 
                              <td><?php echo "" .$row["product_name"] . "";  ?>  </td> 
                              <td><?php echo "" .$row["product_type"] . "";?></td>
                              <td> <?php echo "" .$row["price"] . "";  ?></td> 
                              <td> <?php echo "" .$row["stock"] . "";  ?></td> 

                              <td><a button type="button" class="btn btn-danger" href="admin_upload_delete.php?fileID=<?php echo $row["fileID"]; ?>&location=<?php echo $row["fileupload"];?>">Delete</a></td>
                              <td><a button type="button" class="btn btn-warning" href="admin_edit_upload.php?fileID=<?php echo $row["fileID"]; ?>">Edit</a></td>
                              


                    </tr>
                    <?php
                    }
                    ?>
                    
                    </table>
</div>
<br/>
<?php
mysqli_close($con);
?>

</body>
</html>
<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>