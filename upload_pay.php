<?php
include 'condb.php';
$uname = $_POST['uname'];
$uphone = $_POST['uphone'];
$date = $_POST['datepay'];
$time = $_POST['timepay'];
//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'u_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "admin/imgpay/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

$sql="INSERT INTO pay_con(u_name,u_phone,image,date_pay,time_pay)
VALUES('$uname','$uphone','$new_image_name','$date','$time')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกหลักฐานการโอนเงินเรียบร้อย'); </script>";
    echo "<script> window.location='show_product2.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถบันทึกหลักฐานการโอนเงินได้'); </script>";
}


?>