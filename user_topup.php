<?php include("header.php"); ?>
<body><center>
<div class="container py-5">
    <div class="col-md-7 col-lg-5 col-xl-5">
        <form action="user_topup_save.php" method="post"> <!-- form --><br><br><?php if(isset($_GET["ppp"])){ echo "<label style='color:red !important;'>".$_GET["ppp"]."</label>"; }?><br>
                    คุณมีเงินคงเหลือ <?php echo $_SESSION["money"];?> บาท<br>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-lg-2" id="basic-addon1">จำนวนเงิน</span>
                        <input type="number" min="1"  required name="money" placeholder="จำนวนเงิน" class="form-control"  aria-describedby="basic-addon1">
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">เติมเงิน</button>
        </form>
    </div>
</div></center>
</body>
</html>