<?php include("header.php"); // ใช้ header แทน connect
//1. เชื่อมต่อ database: 
//include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check

    $path="fileupload/";
    $haha = $path."".$_GET["location"];
    unlink($haha);
    $sql = "DELETE FROM uploadfile WHERE fileID = '" . $_GET["fileID"] . "'";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        echo "alert('delete Succesfuly');";
        header("Location: admin_upload_list.php");
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to delete again');";
        echo "</script>";
    }
}


 else {
    echo "<script type='text/javascript'>";
    echo "history.back()";
    echo "</script>";
    }
?>