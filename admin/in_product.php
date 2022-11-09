<?php

include 'session.php';
    
?>

<?php include 'condb.php'; ?>
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
  เพิ่มสินค้าใหม่
</div>
      <form name="form1" method="POST" action="insert_product.php" enctype="multipart/form-data">
        <label>ชื่อสินค้า</label>
        <input type="text" name="pname" class="form-control" require placeholder="ชื่อสินค้า"> <br>
        <select class="form-select" name="typeID">
        <option value="001">เฟอร์นิเจอร์</option>
        <option value="002">ของตกแต่งภายในบ้าน</option>
        <option value="003">ของตกแต่งสวน</option>
        </select><br>
        <label>รายละเอียด</label>
        <input type="text" name="detail" class="form-control" require placeholder="รายละเอียด" require> <br>
        <label>ราคา</label>
        <input type="number" name="price" class="form-control" require placeholder="ราคา" require> <br>
        <label>จำนวน</label>
        <input type="number" name="num" class="form-control" require placeholder="จำนวน" require> <br>     
        <label>รูปภาพ</label>  
        <input type="file" name="file1" require><br><br>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-success">Back</a>
      </form>
    </div>
  </div>
</div>

</body>
</html>