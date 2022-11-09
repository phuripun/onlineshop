<?php 
include('session.php');
include 'condb.php' ?>
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
<br><br>
  <div class="row">

    <?php
    //เรียกข้อมูลจาก database
    $sql ="SELECT * FROM product WHERE amount > 0 ORDER BY pro_id";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){

    ?>

    <div class="col-sm-3"> 
      <img src="img/<?=$row['image']?>" width="250" height="250" class="mt-5 p-2 my-2 border"> <br>
        ID:<?=$row['pro_id']?> <br>
        <h5 class="text-success"><?=$row['pro_name']?> </h5>
        ราคา <b class="text-danger"><?=$row['price']?></b> บาท <br>
        <a class="btn btn-outline-success mt-4" href="sh_product_detail.php?id=<?=$row['pro_id']?>">รายละเอียด</a>
    </div>
      <?php
    }
    mysqli_close($conn);
    ?>  
 

  </div>
</div>


</body>
</html>
