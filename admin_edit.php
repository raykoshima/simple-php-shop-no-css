<?php 
    include("header.php");
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check

   $strCustomerID = null;

   if(isset($_GET["ID"]))
   {
       $strCustomerID = $_GET["ID"];
   }

   

   $sql = "SELECT * FROM login WHERE login_id = '".$strCustomerID."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

<br><br><br>
<div class="container px-5">
<form action="admin_save_edit.php" name="frmAdd" method="post">
  
  <div class="mb-3">
    <fieldset disabled>
        <div class="mb-3">
            <label for="loginid" class="form-label">Login_ID</label>
            <input type="text" id="loginid" class="form-control" placeholder="<?php echo $result["login_id"];?>" style="color: black;">
        </div>
    </fieldset>
    </div>
  
    <div class="mb-3">
        <label for="loginname" class="form-label">Login_Name</label>
        <input type="text" id="loginname" name="login_name" size="20" class="form-control" value="<?php echo $result["login_name"];?>">
        
    </div>
    <div class="mb-3">
        <label for="logilastnname" class="form-label">Login_lastname</label>
        <td><input type="text" id="loginlastname" name="login_lastname" class="form-control" value="<?php echo $result["login_lastname"];?>"></td>
    </div>
    <div class="mb-3">
        <label for="loginuser" class="form-label">Login_User</label>
        <td><input type="text" id="loginuser" name="login_user" class="form-control" value="<?php echo $result["login_user"];?>"></td>
    </div>
    <div class="mb-3">
        <label for="loginpassword" class="form-label">Login_Password</label>
        <td><input type="text" id="loginpassword" name="login_password" class="form-control" value="<?php echo $result["login_password"];?>"></td>
    </div>
    <div class="mb-3">
        <label for="loginlevel" class="form-label">Login_Level</label>
        <td><input type="text" id="loginlevel" name="login_level" class="form-control" value="<?php echo $result["login_level"];?>"></td>
    </div>
   <input type="hidden" name="login_id" value="<?php echo $result["login_id"];?>">
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
<?php
mysqli_close($conn);
?>


  
   
</body>
</html>
<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>