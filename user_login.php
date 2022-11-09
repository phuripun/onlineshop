<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <br><br>
    <div class="container">
        <div class="row">
          <div class="col">
                
                </div>
            <div class="col-md-5 bg-light text-dark">
                <div class="alert alert-primary h3 mt-4" role="alert">
                    Login User(ผู้ใช้งานทั่วไป)!
                </div>
                <form method="POST" action="user_login_check.php">
                    <input type="text" name="username" class="form-control" required placeholder="Username"><br>
                    <input type="password" name="password" class="form-control" required placeholder="Password"><br>
                    <?php
        if(isset($_SESSION["Error"])){
          echo "<div class='text-danger'>";
          echo $_SESSION["Error"];
          echo "</div>";
        }

        ?>
                    <input type="submit" name="submit" class="btn btn-primary" value="Login"><br>

                    หากยังไม่มีบัญชีคลิก
                  <a href="_register.php">Register</a>
                </form>
            </div>
            <div class="col">
                
            </div>
            
        </div><br>
        
    </div>


</body>

</html>