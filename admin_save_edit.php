<?php include("header.php");
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check
    
    if($_POST["login_id"]==''){
        echo "<script type='text/javascript'>"; 
        echo "alert('Error Contact Admin !!');"; 
        echo "window.location = 'admin_page.php'; "; 
        echo "</script>";
        }
         
        //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
            $Login_ID = $_POST["login_id"];
            $Login_Name = $_POST["login_name"];
            $Login_lastname = $_POST["login_lastname"];
            $Login_User = $_POST["login_user"];
            $Login_Password = $_POST["login_password"];    
            $Login_Level = $_POST["login_level"];
         
        //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
            
            $sql = "UPDATE login SET  
                    login_name='$Login_Name' , 
                    login_lastname='$Login_lastname' ,
                    login_user='$Login_User' ,
                    login_password='$Login_Password',  
                    login_level='$Login_Level'
                    WHERE login_id='$Login_ID' ";
         
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
         
        mysqli_close($con);
        if($result){
            echo "<script type='text/javascript'>";
            echo "alert('update Succesfuly');";
            echo "window.location = 'admin_a_page.php'; ";
            echo "</script>";
            }
            else{
            echo "<script type='text/javascript'>";
            echo "alert('Error back to delete again');";
            echo "</script>";
        }
?>

</body>
</html>
<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>