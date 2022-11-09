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
    <title>แสดงข้อมูลการโอนเงิน</title>
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
                        แสดงข้อมูลการโอนเงิน 

                    <div>
                        <form action="report_pay.php" name="from1" method="POST">
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
                                    <th>รูปสลิปการโอนเงิน</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>เบอร์โทรศัพท์ลูกค้า</th>
                                    <th>วันที่โอนเงิน</th>
                                    <th>เวลาที่โอนเงิน</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>payid</th>
                                    <th>u_name</th>
                                    <th>u_phone</th>
                                    <th>date_pay</th>
                                </tr>
                            </tfoot>

                            <?php
                                    $ddt1=@$_POST['dt1'];
                                    $ddt2=@$_POST['dt2'];
                                    $add_date = date('Y/m/d', strtotime($ddt2 . "+1 days"));

                                    if(($ddt1 != "") & ($ddt2 != "")){
                                        echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2 ";
                                        $sql ="select * from pay_con where date_pay BETWEEN '$ddt1' and '$add_date' order by date_pay DESC";
                                    }else{
                                        $sql ="select * from pay_con where  order by date_pay DESC";
                                    }

                                    
                                    $sql ="SELECT * FROM pay_con ORDER BY payid";
                                    $result = mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                    ?>

                            <tr>
                                <td><img src="imgpay/<?=$row['image']?>" width="200" height="200" class="mt-2 p-2 my-2 border"></td>
                                <td><?=$row['u_name']?></td>
                                <td><?=$row['u_phone']?></td>
                                <td><?=$row['time_pay']?></td>
                                <td><?=$row['date_pay']?></td>
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