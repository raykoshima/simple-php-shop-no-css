<?php include("header.php");
      //connection
        if(isset($_POST['Username'])){
                //รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
                //query 
                  $sql="SELECT * FROM login WHERE login_user='".$Username."' AND login_password='".$Password."'";

                  $result = mysqli_query($con,$sql);
                
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["login_id"];
                      $_SESSION["User1"] = $row["login_name"]." ".$row["login_lastname"];
                      $_SESSION["Userlevel"] = $row["login_level"];
                      

                      if($_SESSION["Userlevel"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: admin_a_page.php");

                      }

                      if ($_SESSION["Userlevel"]=="U"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: index.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>