<?php include("header.php");


   $strCustomerID = null;

   if(isset($_GET["fileID"]))
   {
	   $strCustomerID = $_GET["fileID"];
   }

   $sql = "SELECT * FROM uploadfile WHERE fileID = '".$strCustomerID."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
   

?><center>
<form action="user_buy_page.php" name="frmAddaa" method="post">
<table width="284" border="1">
  <tr>
    <th width="120">รหัสสินค้า</th>
    <td width="238"><input type="hidden" name="fileID" value="<?php echo $_GET["fileID"];?>"><?php echo $result["fileID"];?></td>
    </tr>
  <tr>
    <th width="120">รูปสินค้า</th>
    <td><?php echo "" ." <img src='fileupload/".$result["fileupload"]. "'  width='200' higth='200' name='fileupload'>"."" ; ?></td>
    </tr>
      <th width="120">ชื่อสินค้า</th>
    <td><h5 class="card-title" name="product_name" ><?php echo "" .$result["product_name"] . "";  ?></td>
    </tr>
  <tr>
    <th width="120">ประเภทสินค้า</th>
    <td><?php echo $result["product_type"];?></td>
  </tr>
  <tr>
    <th width="120">ราคา</th>
    <td><p class="card-text" name="price" ><?php echo "" .$result["price"] . " บาท";  ?></td>
    </tr>
  </table>
  
    
	<td type="button" align="center"><a href="user_buy_page.php?fileID=<?php echo $result["fileID"];?>">สั่งซื้อ</a></td>
</form></center>
<?php
mysqli_close($conn);
?>
</body>
</html>