<?php include 'condb.php' ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA_Compatible" content="IE-edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Onlineshop</title>
<!-- Bootstrap CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>


</head>
<?php include 'menu.php'?>
<body>
<div class="container">
  <div class="row">
    <?php
        $ids=$_GET['id'];
        $sql="SELECT * FROM product, type WHERE product.type_id= type.type_id and product.pro_id='$ids' ";
        $result = mysqli_query($conn,$sql);
     $row=mysqli_fetch_array($result);
    ?>
    
    <div class="col-md-4">
    <br><br><br>
        <img src="img/<?=$row['image']?>" width="350px" class="mt-3 p-2 my-2 border"/>
    </div>

    <div class="col-md-6">
        <br><br><br><br>
        ID: <?=$row['pro_id']?> <br>
        <h5 class="text-success"></h5><?=$row['pro_name']?> <br>
        ประเภทสินค้า : <?=$row['type_name']?> <br>
        รายละเอียดสินค้า : <?=$row['detail']?> <br>
        ราคา <b class="text-danger"> <?=$row['price']?> </b>  บาท <br>
        <a class="btn btn-outline-success mt-3" href="order.php?id=<?=$row['pro_id']?>">Add Cart</a>

    </div>

  </div>
</div>
<?php
mysqli_close($conn);
?>

</body>
</html>