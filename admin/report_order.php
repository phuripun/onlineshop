<?php
session_start();
include 'session.php'
    
?>

<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>แสดงข้อมูลการสั่งซื้อสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <?php include 'menu1.php';?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        แสดงข้อมูลการสั่งซื้อสินค้า (ยังไม่ชำระเงิน)

                        <div>
                            <br>
                            <a href="report_order_yes.php"><button type="button"class="btn btn-outline-success">ชำระเงินเสร็จสิ้น</button></a>
                            <a href="report_order.php"><button type="button"class="btn btn-outline-primary">ยังไม่ชำระเงิน</button></a>
                            <a href="report_order_no.php"><button type="button"class="btn btn-outline-danger">ยกเลิกรายการ</button></a>
                        </div><br>
                    
                    <div>
                        <form action="report_order.php" name="from1" method="POST">
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="date" name="dt1" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                <input type="date" name="dt2" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                <button type="submit"class="btn btn-primary">ค้นหา</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>เลขที่สั่งซื้อ</th>
                                    <th>ลูกค้า</th>
                                    <th>ที่อยู่จัดส่งสินค้า</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>ราคารวมสุทธิ</th>
                                    <th>วันที่สั่งซื้อ</th>
                                    <th>สถานะการสั่งซื้อ</th>
                                    <th>รายละเอียด</th>
                                    <th>ปรับสถานะการชำระเงิน</th>
                                    <th>ยกเลิกรายการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>orderID</th>
                                    <th>cus_name</th>
                                    <th>address</th>
                                    <th>telephone</th>
                                </tr>
                            </tfoot>

                            <?php
                                    $ddt1=@$_POST['dt1'];
                                    $ddt2=@$_POST['dt2'];
                                    $add_date = date('Y/m/d', strtotime($ddt2 . "+1 days"));

                                    if(($ddt1 != "") & ($ddt2 != "")){
                                        echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2 ";
                                        $sql ="select * from tb_order where order_status='1' and reg_date BETWEEN '$ddt1' and '$add_date' order by reg_date DESC";
                                    }else{
                                        $sql ="select * from tb_order where order_status='1' order by reg_date DESC";
                                    }

                                    
                                    $result=mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($result)){
                                    $status = $row['order_status'];    
                                    ?>

                            <tr>
                                <td><?=$row['orderID']?></td>
                                <td><?=$row['cus_name']?></td>
                                <td><?=$row['address']?></td>
                                <td><?=$row['telephone']?></td>
                                <td><?=$row['total_price']?></td>
                                <td><?=$row['reg_date']?></td>
                                <td>
                                    <?php
                                                if($status == 1){
                                                    echo "<b>ยังไม่ชำระเงิน</b>";
                                                }else if($status == 2){
                                                    echo "<b style='color:blue'>ชำระเงินเสร็จสิ้น</b>";
                                                }else if($status == 0){
                                                    echo "<b style='color:red'>ยกเลิกรายการ</b>";
                                                }
                                                ?>
                                </td>
                                <td><a href="report_order_detail.php?id=<?=$row['orderID']?>" class="btn btn-primary">รายละเอียด</a></td>
                                <td><a href="pay_order.php?id=<?=$row['orderID']?>" class="btn btn-success" onclick="del1(this.href); return false;">ปรับสถานะ</a></td>
                                <td><a href="cancel_order.php?id=<?=$row['orderID']?>" class="btn btn-danger" onclick="del(this.href); return false;">ยกเลิก</a></td>
                            </tr>

                            <?php
                                    }
                                    mysqli_close($conn);
                                    ?>

                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'footer.php';?>


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

<script language="JavaScript">
function del(mypage) {
    var agree = confirm('คุณต้องการยกเลิกรายการสั่งซื้อหรือไม่');
    if (agree) {
        window.location = mypage;
    }
}



function del1(mypage1) {
    var agree = confirm('คุณต้องการปรับสถานะการชำระเงินหรือไม่');
    if (agree) {
        window.location = mypage1;
    }
}
</script>