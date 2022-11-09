<?php
include 'condb.php';
$proid = $_POST['proid'];
$p_name = $_POST['pname'];
$typeID = $_POST['typeID'];
$price = $_POST['price'];
$num = $_POST['num'];
$detail = $_POST['detail'];
$image = $_POST['txtimg'];


//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$image";
    }
    $sql = "UPDATE product SET
    pro_name = '$p_name',
    type_id = '$typeID',
    price = '$price',
    amount = '$num',
    detail = '$detail',
    image = '$new_image_name'
    WHERE pro_id='$proid' ";


$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลสินค้าเรียบร้อย'); </script>";
    echo "<script> window.location='index.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลสินค้าได้'); </script>";
}
?>