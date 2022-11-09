<?php 
include('session.php');
include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Product</title>
    <!-- Bootstrap CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-6 mt-4">
    <div class="alert alert-primary h4 text-center" role="alert">
  แนบหลักฐานการโอน
</div>
      <form name="form1" method="POST" action="upload_pay.php" enctype="multipart/form-data">
        <label>ชื่อผู้สั่งตรงกับในใบสั่งซื้อ</label>
        <input type="text" name="uname" class="form-control" required placeholder="ชื่อผู้สั่ง"> <br>
        <label>เบอร์โทรตรงกับในใบสั่งซื้อ</label>
        <input type="text" name="uphone" class="form-control" required placeholder="เบอร์โทร" > <br>
        <label>วันที่โอนเงินตรงกับในสลิปโอนเงิน</label>
        <input type="date" name="datepay" class="form-control" required placeholder="วันที่โอนเงิน" > <br>
        <label>เวลาที่โอนเงินตรงกับในสลิปโอนเงิน</label>
        <input type="time" name="timepay" class="form-control" required placeholder="เวลาที่โอนเงิน" > <br>
        <label>รูปภาพ</label>  
        <input type="file" name="file1" required><br><br>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="show_product2.php" class="btn btn-success">Back</a>
      </form>
    </div>
  </div>
</div>

</body>
</html>