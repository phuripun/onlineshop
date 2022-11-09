<?php
session_start();
include 'condb.php';
$sql="select * from tb_order where orderID= '" . $_SESSION["order_id"] . "' ";
$result = mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
$total_price=$rs['total_price'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-primary h4 text-center mt-4" role="alert">
                    การสั่งซื้อเสร็จสมบูรณ์
                </div>
                เลขที่การสั่งซื้อ : <?=$rs['orderID']?> <br>
                ชื่อ-นามสกุล (ลูกค้า) : <?=$rs['cus_name']?> <br>
                ที่อยู่การจัดส่งสินค้า : <?=$rs['address']?> <br>
                เบอร์โทรศัพท์ : <?=$rs['telephone']?> <br>

                <div class="card mb-4 mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>ราคารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1="select * from order_detail d,product p where d.pro_id=p.pro_id and d.orderID= '" . $_SESSION["order_id"] . "' ";
                            $result1 = mysqli_query($conn,$sql1);
                            while($row=mysqli_fetch_array($result1)){

    
                        ?>
                            <tr>
                                <th><?=$row['pro_id']?></th>
                                <td><?=$row['pro_name']?></td>
                                <td><?=$row['orderPrice']?></td>
                                <td><?=$row['orderQty']?></td>
                                <td><?=$row['Total']?></td>
                            </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                    </table>

                    <h6 class="text-end">รวมเป็นเงิน <?=number_format($total_price,2)?> บาท</h6>
                </div>
                <div><br>
             ***กรุณาโอนเงินภายใน 24 ชั่วโมง หลังจากทำการสั่งซื้อสินค้า โอนเงินผ่านธนาคารกสิกร ชื่อบัญชี นายภูริปัญญ์ ชัยชัชวาล เลขที่บัญชั 999999999***
             </div><br><br><br>
             <a href="show_product2.php" class="btn btn-success">Back</a>  
             <button onclick="window.print()" class="btn btn-primary">print</button>
            </div>
              

        </div>
    </div>
    </div>
</body>

</html>