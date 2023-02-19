<?php include("header.php");
//include('connect.php');  ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี | ใช้ตัว header แทน
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check


$query = "SELECT * FROM uploadfile ORDER BY fileID asc" or die("Error:" . mysqli_error()); 
$result = mysqli_query($con, $query); 

echo "<table border='1' align='center' width='750' class='ray'>";
echo "<tr align='center' bgcolor='#CCCCCC'><th>รหัสสินค้า</th><th>ชื่อไฟล์</th><th>วันที่สร้าง</th><th width='150'>ชื่อสินค้า</th><th width='150'>ราคา</th></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["fileID"] .  "</td> "; 
  //echo "<td><a href='.$row['fileupload']'>showfile</a></td> ";
  echo "<td>"  .$row["fileupload"] . "</td> ";  
  echo "<td align='center'>" .$row["dateup"] .  "</td> ";
  echo "<td align='center'>" .$row["product_name"] .  "</td> ";
  echo "<td align='center'>" .$row["price"] .  "</td> ";

  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
<br>
<style>
  .ray th{
    color:black !important;
  }
  .bgr td{
    color:black !important;
  }
</style>
<div class="bgr">
<form action="admin_upload_add.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
  <p>&nbsp;</p>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" colspan="2" align="center" bgcolor="#D6D6D6">อัพไฟล์</td>
    </tr><center>
    <div class="col-sm-5">
          ชื่อสินค้า
          <input type="text"  required name="product_name" placeholder="ชื่อสินค้า" class="form-control"  ><br>
          ราคา
          <input type="number" required name="price" placeholder="ราคา" class="form-control"  ><br>
          ประเภท<br>
          <select name="type_p" class="form-control">
                    <option value="A">ประเภท A</option>
                    <option value="B">ประเภท B</option>
                    <option value="C">ประเภท C</option>
          </select><br><br><br>
    </div></center>
    <tr>
      <td width="126" bgcolor="#EDEDED">&nbsp;</td>
      <td width="574" bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#EDEDED">File Browser</td>
      <td bgcolor="#EDEDED"><label>
        <input type="file" name="fileupload" id="fileupload"  required="required"/>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED"><input type="submit" name="button" id="button" value="Upload" /></td>
    </tr>
    <tr>
      <td bgcolor="#EDEDED">&nbsp;</td>
      <td bgcolor="#EDEDED">&nbsp;</td>
    </tr>

  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
</div>
<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>