<?php include("header.php");
    

    $query = "SELECT * FROM uploadfile ORDER BY fileID DESC" ; 
    $result = mysqli_query($con, $query); 


?>
<!-- body -->
<center>
    <h1>Our Product</h1>
</center>
<br><br><br>



<div class="row">
<?php while($row = mysqli_fetch_array($result))
        {
    ?>
    <div class="col-md-4">
        <div class="thumbnail">
            <div class="caption m-3">
            <p><h2>ชื่อสินค้า: <?php echo "" .$row["product_name"] . "";  ?></h2><h3><br>ราคา <?php echo $row["price"];?> บาท คงเหลือ <?php echo $row["stock"];?> ชิ้น</h3></p>
            </div>
            <a href="user_buy_page.php?fileID=<?php echo $row["fileID"];?>" ><img src="fileupload/<?php echo $row["fileupload"];?>" width="85%" height="500"></a>
            
        </div>
    </div> 
    <?php } ?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



</body>
</html>