<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="src/css/bootstrap.css">
<link rel="stylesheet" href="src/css/raykocustom.css">
<link rel="icon" type="image/" href="src\img\favicon.jpg" >
<title>Easy</title>
</head>
<style>
  select{
        color:black !important;
    }
</style>

<!-- header -->

<body data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Supakorn</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="list.php?type=A">สินค้า A</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="list.php?type=B">สินค้า B</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="list.php?type=C">สินค้า C</a>
              </li>
              
            <?php if(isset($_SESSION["UserID"]) && $_SESSION["Userlevel"] == 'A'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="admin_upload_list.php">Upload</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_a_page.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_topup.php">เติมเงิน</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_history.php">ดูประวัติการซื้อ</a>
              </li>
             
            </ul>
            <span class="navbar-text">
               เงินคงเหลือ <?php echo $_SESSION["money"];?> บาท <?php echo $_SESSION["User1"];?> &nbsp;&nbsp; <a href="logout.php">Logout</a>
            </span>
            <?php } elseif(isset($_SESSION["UserID"]) && $_SESSION["Userlevel"] == 'U'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="user_topup.php">เติมเงิน</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_history.php">ดูประวัติการซื้อ</a>
              </li>
            </ul>
            <span class="navbar-text">
            เงินคงเหลือ <?php echo $_SESSION["money"];?> บาท <?php echo $_SESSION["User1"];?> &nbsp;&nbsp; <a href="logout.php">Logout</a>
            </span>
            <?php } else {?>
            </ul>
              <span class="navbar-text">
              <a href="login.php">Login</a> &nbsp;&nbsp; <a href="register.php">Register</a>
            </span>
            <?php } ?>
          </div>
        </div>
      </nav>



<!--footer-->
<nav class="navbar fixed-bottom bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://github.com/raykoshima" target="_new">bottom | website make by @raykoshima</a></a>
  </div>
</nav>

