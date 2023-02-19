<?php include("header.php");?>
</head>
<body>
<?php
   $fileID = null;

   if(isset($_GET["fileID"]))
   {
	   $fileID = $_GET["fileID"];
   }

   $sql = "SELECT * FROM uploadfile WHERE fileID = '".$fileID."' ";

   $query = mysqli_query($conn,$sql);

   $row=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form action="user_buy_save.php" name="frmAddaaaaa" method="post"> <!-- Form -->
<center><table border="0" class="pa">

	<center><h2>สินค้ารหัส <?php echo $row["fileID"]; ?></h2></center>
        <td></td><td>&nbsp;&nbsp;<img src="fileupload/<?php echo $row["fileupload"];?>" class="rounded float-left" width="250" height=""></td><tr></tr>
        </table><br>
				<h3>
        <table>
          <td>รหัสสินค้า</td> <td>&nbsp;&nbsp;<?php echo $row["fileID"];?></td><tr></tr>
          <td>ชื่อสินค้า</td> <td>&nbsp;&nbsp;<?php echo $row["product_name"];?></td><tr></tr>
          <td>ประเภทสินค้า</td> <td>&nbsp;&nbsp;<?php echo $row["product_type"];?></td><tr></tr>
          <td>ราคา</td> <td>&nbsp;&nbsp;<?php echo $row["price"];?></td><tr></tr>
          <td>คงเหลือ</td> <td>&nbsp;&nbsp;<?php echo $row["stock"];?> ชิ้น</td><tr></tr>
        </h3>
          <td>จำนวน</td><td><input type="number" value="1" name="quantity"></td>
        </table> 
        <input type="hidden" name="fileID" value="<?php echo $row["fileID"];?>">
        <input type="submit" name="submit" value="submit">
</center>
  
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>