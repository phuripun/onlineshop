<?php
session_start();
$objConnect = mysqli_connect("localhost","root","")or die ("Can't connect to database");
$db = mysqli_select_db($objConnect,"onshopdb");
mysqli_query($objConnect,"SET NAMES utf8");

if($objConnect->connect_error){
  die("Connection failed" . $conn->connect_error);
}

$username = mysqli_real_escape_string($objConnect, $_POST['username']);
$password = mysqli_real_escape_string($objConnect, $_POST['password']);

$strSQL = "SELECT * FROM tb_employee WHERE username = '$username' and password = '$password'";
$objQuery = mysqli_query($objConnect,$strSQL);
$objResult = mysqli_fetch_array($objQuery);

if(!$objResult){
  echo "<script>";
  echo "alert(\" ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง \");";
  echo "</script>";
}else {
  $_SESSION["status"] = $objResult["status"];
  if($_SESSION["status"]=="1"){
    $_SESSION["username"]=$objResult["username"];
   header("Location:index.php");
  //echo "admin";
  }
  if($_SESSION["status"]=="0"){
    $_SESSION["username"]=$objResult["username"];
    header("Location:../show_product2.php");
   //echo "user";
  }
}



?>