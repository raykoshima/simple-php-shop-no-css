<?php include("header.php");
if(isset($_SESSION["Userlevel"]) && $_SESSION["Userlevel"] == 'A'){     // admin check

    $sql1 = "SELECT fileupload FROM uploadfile WHERE fileID='".$_POST["fileID"]."'";
    $result1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_array($result1);
    
    $path = "fileupload/";
    $fileupload = $row1["fileupload"];
    $filelocation = $path."".$fileupload;

    $fileID = $_POST["fileID"];
    $product_name = $_POST["product_name"];
    $product_type = $_POST["product_type"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    $date = date("Ymd");
    $numrand = (mt_rand());
    $upload=$_FILES['fileupload'];
    $type = strrchr($_FILES['fileupload']['name'],".");
    $newname = $date.$numrand.$type;
    $path_copy=$path.$newname;
    $path_link=$path.$newname;
    

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
                
            $sql = "UPDATE uploadfile SET  
                product_name='$product_name' ,
                price='$price',
                product_type='$product_type',
                stock='$stock'
                WHERE fileID='$fileID' ";
            
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
            
            mysqli_close($con);
            if($result){
                header("Location: admin_upload_list.php");
                }
                else{
                echo "<script type='text/javascript'>";
                echo "alert('Error back to delete again');";
                echo "</script>";
            }
}
else{
              
            unlink($filelocation);
            move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	

            $sql = "UPDATE uploadfile SET  
                    fileupload='$newname' , 
                    dateup='$date' , 
                    product_name='$product_name' ,
                    price='$price',
                    product_type='$product_type',
                    stock='$stock'
                    WHERE fileID='$fileID' ";
         
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
         
        mysqli_close($con);
        if($result){
            header("Location: admin_upload_list.php");
            }
            else{
                echo "<script type='text/javascript'>";
                echo "alert('Error back to delete again');";
                echo "</script>";
        }
}
            
?>
<?php } else {
echo "<script type='text/javascript'>";
echo "history.back()";
echo "</script>";
}
?>