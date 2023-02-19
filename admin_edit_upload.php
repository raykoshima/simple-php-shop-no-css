<?php include("header.php");
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check

$fileID = $_GET["fileID"];

$sql = "SELECT * FROM uploadfile WHERE fileID = '".$fileID."' ";

$query = mysqli_query($con,$sql);

$row=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<style>
    .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    }
    input[type="file"] {
    display: none;
    }
    select{
        color:black !important;
    }
</style>
<script src="src/js/jquery-3.5.1.min.js"></script>  <!-- js -->
<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#file-upload-filename').html('เลือกไฟล์ '+ fileName);
        });
    });
</script>
<center><br><br>
    <label class="titlef"><b>Edit Product</b></label>
    <br><br>
    <form action="admin_edit_upload_save.php" name="frmAddaaaaa" method="post" enctype="multipart/form-data"> <!-- Form -->
<center>
    <table border="0">
	<center><h2>สินค้ารหัส <?php echo $row["fileID"]; ?></h2></center>
    <td>&nbsp;&nbsp;<img src="fileupload/<?php echo $row["fileupload"];?>" class="rounded float-left" width="250" height=""></td><tr></tr>
    <td>&nbsp;&nbsp;<br><center><label for="fileupload" class="custom-file-upload">อัพไฟล์ใหม่</label></center></td><tr></tr>
    <td><input id="fileupload" type="file" name="fileupload"></td><tr></tr>
    
    
    </table>
    <center><div id="file-upload-filename"></div></center><br>
        
        
          <div class="col-sm-5">
          ชื่อสินค้า
          <input type="text"  required name="product_name" placeholder="ชื่อสินค้า" class="form-control"  value="<?php echo $row["product_name"]; ?>"><br>
          ราคา
          <input type="number" required name="price" placeholder="ราคา" class="form-control"  value="<?php echo $row["price"]; ?>"><br>
          ประเภท<br>

          <select name="product_type" class="form-control">
          <?php if($row["product_type"] == "A"){?>
            <option value="A" selected="selected">ประเภท A</option>
            <option value="B">ประเภท B</option>
            <option value="C">ประเภท C</option>
          <?php }elseif($row["product_type"] == "B"){?>
            <option value="A" >ประเภท A</option>
            <option value="B" selected="selected">ประเภท B</option>
            <option value="C">ประเภท C</option>
          <?php }elseif($row["product_type"] == "C"){?>
            <option value="A" >ประเภท A</option>
            <option value="B" >ประเภท B</option>
            <option value="C" selected="selected">ประเภท C</option>
            <?php } ?>
          </select><br>
          สต็อกสินค้า
          <input type="number" min="0" require name="stock" placeholder="จำนวนสินค้าในคลัง" class="form-control" value="<?php echo $row["stock"];?>"><br>

    </div></center>
        </h3>
        
        <input type="hidden" name="fileID" value="<?php echo $row["fileID"];?>">
        <input type="submit" name="submit" value="submit">
</center>
<br><br><br><br><br><br><br><br><br><br><br>
</form>
</center>







<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>