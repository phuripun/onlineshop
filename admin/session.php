<?php
    session_start();
    $objConnect = mysqli_connect("localhost","root","")or die("Can't connect to database");
    $db = mysqli_select_db($objConnect, "onshopdb");
    mysqli_query($objConnect, "SET NAMES utf8");

    if($objConnect->connect_error) {
        die("Connection failed". $conn->connect_error);
    }

    $user_check = $_SESSION['username'];

    $strSQL = "SELECT username FROM tb_employee WHERE username = '$user_check'";
    $ses_sql = mysqli_query($objConnect, $strSQL);

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_session = $row['username'];

    if(!isset($_SESSION['username'])){
        header("location:login.php");
        die();
    }
?>