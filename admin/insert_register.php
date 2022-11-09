<?php
include 'condb.php';
//รับค่าจากไฟล์ register.php
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['telephone'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO tb_employee(fullname,email,telephone,username,password,status)
values('$name','$email','$phone','$username','$password','1')";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert ('บันทึกข้อมูลสำเร็จ')</script>";
    echo "<script> window.location='fr_employee.php';</script>";
}else{
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert ('***ไม่สามารถบันทึกข้อมูลได้***')</script>";
}
mysqli_close($conn);

?>