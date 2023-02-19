<?php include("header.php");
if(isset($_SESSION["UserID"])){
	$sql1 = "SELECT * FROM uploadfile WHERE fileID='".$_POST["fileID"]."'";
    $result = mysqli_query($con,$sql1);
    if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);

	$loginid = $_SESSION["UserID"]; // session user id
	$money = $_SESSION["money"];

    $id = $row["fileID"]; // row from database
	$product_name = $row["product_name"];
	$product_type = $row["product_type"];
	$price = $row["price"];
	$stock = $row["stock"];
	
	$quantity = $_POST["quantity"]; // post from last page

	$sumstock = $stock - $quantity;
	$sum = $price * $quantity;
	$totalmoneyleft = $money - $sum;
	if($sumstock < 0){
		echo "<script type='text/javascript'>";
		echo "alert('ของหมด!!');";
		echo "history.back()";
		echo "</script>";
	} else {
		if($totalmoneyleft < 0)
		{
			header("Location:user_topup.php?ppp=กรุณาเติมเงิน");
		} else {
		$sql = "INSERT INTO user_buy (fileID,product_name,login_id,product_type,Price,quantity,total) VALUES 
		('$id','$product_name','$loginid','$product_type','$price','$quantity','$sum')";
		$query = mysqli_query($conn,$sql);
			if($query) 
			{
				$stockupdate = "UPDATE uploadfile SET stock = '$sumstock' WHERE fileID = '$id'";
				mysqli_query($conn,$stockupdate);
				$moneyupdate = "UPDATE login SET user_money = '$totalmoneyleft' WHERE login_id = '$loginid'";
				mysqli_query($con,$moneyupdate);
				echo "<script type='text/javascript'>";
				//echo "alert('$totalmoneyleft');";
				echo "</script>";
				header("Location: user_history.php");
			}
			mysqli_close($conn);
		}	
	}
	}	// ปิดบรรทัด 5
} else {
	header("Location:login.php?ppp=กรุณา login");
} ?>
