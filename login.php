<?php include("header.php");?>
<?php if(isset($_SESSION["UserID"])){       // กันคน login แล้วไม่ให้ทำซ้ำ
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
error_reporting(~0);
} else {?>
<center>
<br><h1>Login</h1><br>
<?php if(isset($_GET["ppp"])){ echo "<label style='color:red !important;'>".$_GET["ppp"]."</label>"; }?><br>
<form name="login" action="login_save.php" method="post"> <!-- form -->
<div class="container py-5">
    <div class="col-md-7 col-lg-5 col-xl-5">
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text col-lg-2" id="basic-addon1">Username</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="Username">
            </div>
            <div class="input-group mb-3 ">
                <span class="input-group-text col-lg-2" id="basic-addon1">Password</span>
                <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="Password">
            </div>

        

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-lg btn-block">Log me in</button>

        <div class="divider d-flex align-items-center">
            <p class="text-center fw-bold  text-muted">Don't Have Account? <a href="register.php">Register</a><br></p>
        </div>
        </form>
    </div>
</div>
</form>
</center>
</body>
</html>
<?php } ?>