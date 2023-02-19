<?php
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){
	$date = date("Ymd");
    $numrand = (mt_rand());
    $upload=$_FILES['fileupload'];
    $path="fileupload/";
    $haha = $path."".$_GET["fileuploadz"];
    $type = strrchr($_FILES['fileupload']['name'],".");
    $newname = $date.$numrand.$type;
    $path_copy=$path.$newname;
    $path_link="fileupload/".$newname;
  
    if($_POST["fileID"]==''){
        echo "<script type='text/javascript'>"; 
        echo "alert('Error Contact Admin !!');"; 
        echo "window.location = 'Showdata.php'; "; 
        echo "</script>";
    }

if($_FILES["fileupload"]["error"] != 0){
            $fileID = $_POST["fileID"];
            $product_name = $_POST["product_name"];
            $price = $_POST["price"];
                
            $sql = "UPDATE uploadfile1 SET  
                product_name='$product_name' ,
                price='$price'
                WHERE fileID='$fileID' ";
            
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
            
            mysqli_close($con);
            if($result){
                echo "<script type='text/javascript'>";
                echo "window.location = 'listpro1.php'; ";
                echo "</script>";
                }
                else{
                echo "<script type='text/javascript'>";
                echo "alert('Error back to delete again');";
                echo "</script>";
            }
}
else{
              
            unlink($haha);
            move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
            
            $fileID = $_POST["fileID"];
            $dateup = $_POST["dateup"];
            $product_name = $_POST["product_name"];
            $price = $_POST["price"];

            $sql = "UPDATE uploadfile1 SET  
                    fileupload='$newname' , 
                    dateup='$dateup' , 
                    product_name='$product_name' ,
                    price='$price'
                    WHERE fileID='$fileID' ";
         
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
         
        mysqli_close($con);
        if($result){
            echo "<script type='text/javascript'>";
            echo "window.location = 'listpro1.php'; ";
            echo "</script>";
            }
            else{
            echo "<script type='text/javascript'>";
            echo "alert('Error back to delete again');";
            echo "</script>";
        }
}
            
} else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>