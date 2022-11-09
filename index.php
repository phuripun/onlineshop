<?php
    session_start();
    $objConnect = mysqli_connect("localhost","root","")or die("Can't connect to database");
    $db = mysqli_select_db($objConnect, "onshopdb");
    mysqli_query($objConnect, "SET NAMES utf8");
?>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="main.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Furniture Stores</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="show_product.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">ตะกร้าสินค้า</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userpay_confirm.php">หลักฐานการโอนเงิน</a>
                </li>
                <li class="nav-item">
                    <a href="admin/index.php" class="nav-link">Admin</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-2 " type="submit">Search</button>
            </form>
            <a href="user_login.php"><button class="btn btn-primary" type="submit">Login</button></a>
        </div>
    </div>
</nav>


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
