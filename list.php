<?php include("header.php");
if(isset($_GET["type"])){
    $query = "SELECT * FROM uploadfile WHERE product_type = '".$_GET["type"]."' ORDER BY fileID DESC" ;
    $result = mysqli_query($con, $query); 


?>
<!-- body -->
<center>
    <h1>Product <?php echo $_GET["type"];?></h1>
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
            <img src="fileupload/<?php echo $row["fileupload"];?>" width="80%" height="400">
            <br><br><a href="user_buy_page.php?fileID=<?php echo $row["fileID"];?>" style="padding:200px;"><button type="button" class="btn btn-primary btn-lg">Buy</button></a>
        </div>
    </div> 
    <?php } ?>
</div>




</body>
</html>
<?php } else {
    echo "<script type='text/javascript'>";
    echo "history.back()";
    echo "</script>";
}