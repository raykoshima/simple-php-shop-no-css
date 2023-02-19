<?php include("header.php");
    

    $sql = "INSERT INTO login (login_name, login_lastname, login_user, login_password, login_level) 
        VALUES ('".$_POST["Login_Name"]."','".$_POST["Login_lastname"]."'
        ,'".$_POST["Login_User"]."','".$_POST["Login_Password"]."','U')";

    $query = mysqli_query($con,$sql);

    if($query) {
        echo "Record add successfully";
    }

    mysqli_close($con);
?>