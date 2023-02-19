<?php include("header.php"); 
if(isset($_SESSION["UserID"])){     // user check

    $sql2="SELECT * FROM user_buy WHERE login_id='".$_SESSION["UserID"]."' ORDER BY buy_ID DESC";
    $result2 = mysqli_query($con,$sql2);

    //$fileID = $row["fileID"];
    //$product_name = $row["product_name"];
    //$product_type = $row["product_type"];
    //$price = $row["Price"];
    //$quantity = $row["quantity"];
    //$total = $row["total"];
    
?>
<br><br><h2><center>ประวัติการสั่งซื้อ</center></h2>
<table class="table table-striped">
  <thead>
    <tr>
    <th></th>
      <th scope="col">รหัสสินค้า</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">ประเภทสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคาต่อชิ้น</th>
      <th scope="col">ราคารวม</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($result2)) {?>
    <tr>
      <td></td>
      <td><?php echo $row["fileID"];?></td>
      <td><?php echo $row["product_name"];?></td>
      <td><?php echo $row["product_type"];?></td>
      <td><?php echo $row["quantity"];?></td>
      <td><?php echo $row["Price"];?></td>
      <td><?php echo $row["total"];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>


<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>