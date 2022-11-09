<?php

include 'session.php'
    
?>

<?php
include 'condb.php';
$ids=$_GET['id'];
$sql="SELECT * FROM product WHERE pro_id='$ids'";
$hand=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($hand);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Up Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-5">

        <form name="form1" method="POST" action="upstock.php">
            <div class="mb-3 mt-3">
                <label>รหัสสินค้า</label>
                <input type="text" name="pid" class="form-control" readonly value="<?=$row['pro_id']?>">
            </div>
            <div class="mb-3 mt-3">
                <label>ชื่อสินค้า</label>
                <input type="text" name="pname" class="form-control" readonly value="<?=$row['pro_name']?>">
            </div>
            <div class="mb-3 mt-3">
                <label>เพิ่มจำนวนสินค้า</label>
                <input type="text" name="pnum" class="form-control" require>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Submit">
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
        </div>
            </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>