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
                        
                       
                    <div>
                    </div>


                    <div class="card-body">

            <div class="row">
            <div class="col-sm-6">
                    <div class="alert alert-primary h4" role="alert">
                     เพิ่มข้อมูลพนักงาน
                    </div>
        
        
        <form method="POST" action="insert_register.php" >
        ชื่อ-นามสกุล <input type="text" name="fullname" class="form-control" required placeholder="ชื่อ-นามสกุล" >
        Email <input type="text" name="email" class="form-control" required placeholder="Email" >
        เบอร์โทรศัพท์ <input type="text" name="telephone" class="form-control" required placeholder="เบอร์โทรศัพท์" >
        Username <input type="text" name="username" class="form-control" required placeholder="Username" >
        Password <input type="password" name="password" maxlength="10" class="form-control" required placeholder="Password" ><br>
        <input type="submit" name="submit" class="btn btn-success" value="บันทึก">
        <input type="reset" name="cancel" class="btn btn-danger" value="ยกเลิก"> <br><br>

        
        </form>
        </div>
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

