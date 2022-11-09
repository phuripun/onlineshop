<?php
session_start();
include 'session.php'
    
?>

<?php 
include 'condb.php'; 
$idpro = $_GET['id'];
$sql = "SELECT * FROM product WHERE pro_id='$idpro' ";
$result = mysqli_query($conn,$sql);
$rs = mysqli_fetch_array($result);
?>


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
  แก้ไขสินค้า
</div>
      <form name="form1" method="POST" action="update_product.php" enctype="multipart/form-data">
        <label>รหัสสินค้า</label>
        <input type="text" name="proid" class="form-control" VALUE="<?=$rs['pro_id']?>" > <br>
        <label>ชื่อสินค้า</label>
        <input type="text" name="pname" class="form-control" VALUE="<?=$rs['pro_name']?>" > <br>
        <select class="form-select" name="typeID">
        <option value="001">เฟอร์นิเจอร์</option>
        <option value="002">ของตกแต่งภายในบ้าน</option>
        <option value="003">ของตกแต่งสวน</option>
        </select><br>
        <label>รายละเอียด</label>
        <input type="text" name="detail" class="form-control" VALUE=<?=$rs['detail']?>> <br>
        <label>ราคา</label>
        <input type="number" name="price" class="form-control" VALUE=<?=$rs['price']?>> <br>
        <label>จำนวน</label>
        <input type="number" name="num" class="form-control" VALUE=<?=$rs['amount']?>>  <br>    
        <label>รูปภาพ</label>  <br>
        <img src="../img/<?=$rs['image']?>" width="100" height="100" class=" p-2 my-2 border"><br>
        <input type="file" name="file1" ><br><br>
        <input type="hidden" name="txtimg" class="form-control" VALUE=<?=$rs['image']?>>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>
</div>

</body>
</html>