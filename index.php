
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login Admin</title>

    <!-- Le styles -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-hal-login.css" rel="stylesheet"> 
 
  </head>
<div align = "center">
  <body class="blue-login">

    <div class="login-container">
        <div style="padding-top:200px" class="login-header bordered">
            <h4>Login Admin</h4>
        </div>

        <form style="padding-top:50px" id="logform" name="logform" action="" method="POST">
            <div class="login-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <i class="icon-user"></i>
            </div>
            <div class="login-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <i class="icon-lock"></i>
            </div>
            <div class="login-button clearfix">
                <button value="login" type="submit">Login</button>
            </div>
        </form>
    </div>

    </div>
      </body>
  </div>
</html>


<?php
    
    if(isset($_POST['username'])){
        include "koneksi.php";
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "select * from user where username='$user' and password='$pass'";
        $hasil = mysql_query($sql);
        if($hasil==true){
            header("Refresh: 0; URL='dataMahasiswa.php'");
        }else{ 
            echo "<script>alert('login gagal')</script>";
            echo "<script>history.go(-1);</script>"; 
        }
    }
?>