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
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <?php include 'menu1.php';?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">เช็คจำนวนสินค้า</h1>
                
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>เพิ่มสินค้า</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>pro_id</th>
                                    <th>pro_name</th>
                                    <th>detail</th>
                                    <th>type_name</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                        $sql="SELECT * FROM product p,type t WHERE p.type_id=t.type_id";
                                        $hand=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_array($hand)){

                                        
                                       ?>
                                <tr>
                                    <td><img src="../img/<?=$row['image']?>" width="100" height="100" class="mt-5 p-2 my-2 border"></td>
                                    <td><?=$row['pro_id']?></td>
                                    <td><?=$row['pro_name']?></td>
                                    <td><?=$row['detail']?></td>
                                    <td><?=$row['type_name']?></td>
                                    <td><?=$row['price']?></td>
                                    <td><?=$row['amount']?></td>
                                    <td><a href="addstock.php?id=<?=$row['pro_id']?>" class="btn btn-success">เพิ่ม</td>
                                    <td><a href="edit_product.php?id=<?=$row['pro_id']?>" class="btn btn-warning">แก้ไข</a></td>
                                </tr>
                                <?php
                                     }
                                     ?>

                            </tbody>
                        </table>
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