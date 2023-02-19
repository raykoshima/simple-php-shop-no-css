<?php include("header.php");
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check
?>
<body><center>
<div class="container py-5">
    <div class="col-md-7 col-lg-5 col-xl-5">
        <form action="admin_insert.php" method="post"> <!-- form -->
                    <div class="input-group mb-3">
                        <span class="input-group-text col-lg-2" id="basic-addon1">Username</span>
                        <input type="text"    required name="Login_User" placeholder="Username" class="form-control"  aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-lg-2" id="basic-addon1">Password</span>
                        <input type="password"    required name="Login_Password" placeholder="Login_Password" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-lg-2" id="basic-addon1">Name</span>
                        <input type="text"    required name="Login_Name" placeholder="name" class="form-control"  aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-lg-2" id="basic-addon1">Lastname</span>
                        <input type="text"    required name="Login_lastname" placeholder="lastname" class="form-control"  aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-lg-2" id="basic-addon1">Level</span>
                        <select name="Login_Level" class="form-control">
                            <option value="A">Admin</option>
                            <option value="U">User</option>
                        </select>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Insert</button>
        </form>
    </div>
</div></center>
</body>
</html>
<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>