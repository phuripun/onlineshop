<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <br><br>

        <div class="row">
            <div class="col">
                
            </div>
            <div class="col-md-5 bg-light text-dark">

                <div class="alert alert-primary h4" role="alert">
                    สมัครสมาชิก
                </div>

                <br>
                <form method="POST" action="user_insert_register.php">
                    ชื่อ-นามสกุล <input type="text" name="fullname" class="form-control" required
                        placeholder="ชื่อ-นามสกุล">
                    Email <input type="text" name="email" class="form-control" required placeholder="Email">
                    เบอร์โทรศัพท์ <input type="text" name="telephone" class="form-control" required
                        placeholder="เบอร์โทรศัพท์">
                    Username <input type="text" name="username" class="form-control" required placeholder="Username">
                    Password <input type="password" name="password" maxlength="10" class="form-control" required
                        placeholder="Password"><br>
                    <input type="submit" name="submit" class="btn btn-success" value="บันทึก">
                    <input type="reset" name="cancel" class="btn btn-danger" value="ยกเลิก"> <br><br>

                    <a href="user_login.php">Login</a>
                </form>
            </div>
            <div class="col">
      
    </div>


        </div>
    </div>


</body>

</html>