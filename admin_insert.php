<?php include("header.php");
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check


    $sql = "INSERT INTO login (login_name,login_lastname,login_user,login_password,login_level) 
        VALUES ('".$_POST["Login_Name"]."','".$_POST["Login_lastname"]."'
        ,'".$_POST["Login_User"]."','".$_POST["Login_Password"]."','".$_POST["Login_Level"]."')";

    $query = mysqli_query($con,$sql);

    mysqli_close($con);

    if($query){
        echo "<script type='text/javascript'>";
        echo "alert('UPDATE Succesfuly');";
        echo "window.location = 'admin_a_page.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to delete again');";
        echo "</script>";
    }
} else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>
    