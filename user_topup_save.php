<?php include("header.php");
if(isset($_SESSION["UserID"])){     // user check

    $sql2="SELECT user_money FROM login WHERE login_id='".$_SESSION["UserID"]."'";
    $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)==1){
    $row = mysqli_fetch_array($result2);
    $old_money = $row["user_money"];
    $new_money = $_POST["money"];
    $sum = $old_money + $new_money;
    }
    mysqli_close($con);

    $con2 = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Error: " . mysqli_error($con2));
    mysqli_query($con2,"set names utf8 ");

    $sql = "UPDATE login SET user_money = '".$sum."' WHERE login_id='".$_SESSION["UserID"]."'";

    $query = mysqli_query($con2,$sql);

    mysqli_close($con2);

    if($query){
        header("Location: user_topup.php");
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to delete again');";
        echo "</script>";
        header("Location: user_topup.php");
    }
} else {
header("Location: user_topup.php");
}
?>
    