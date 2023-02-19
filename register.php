<?php include("header.php");?>
<?php if(isset($_SESSION["UserID"])){       // กันคน login แล้วไม่ให้ทำซ้ำ
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
} else {?>
<center>
<br><h1>Register</h1><br>
<div class="container py-5">
    <div class="col-md-7 col-lg-5 col-xl-5">
        <form action="register_save.php" method="post"> <!-- form -->

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
            

        

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>

        <div class="divider d-flex align-items-center ">
            <p class="text-center fw-bold  text-muted">Have an account? <a href="login.php">Login</a></p>
        </div>
        </form>
    </div>
</div>
</center>

</body>
</html>
<?php } ?>