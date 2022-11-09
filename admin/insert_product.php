<?php
include 'condb.php';
$p_name = $_POST['pname'];
$typeID = $_POST['typeID'];
$price = $_POST['price'];
$num = $_POST['num'];
$detail = $_POST['detail'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

$sql="INSERT INTO product(pro_name,type_id,price,amount,image,detail)
VALUES('$p_name','$typeID','$price','$num','$new_image_name','$detail')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกสินค้าเรียบร้อย'); </script>";
    echo "<script> window.location='in_product.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถบันทึกสินค้าได้'); </script>";
}


?>