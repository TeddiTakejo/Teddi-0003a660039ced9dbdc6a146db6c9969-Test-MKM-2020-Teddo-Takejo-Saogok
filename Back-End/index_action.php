<?php  

include 'koneksi.php';
$username = "";
$email = "";

    //jika user tidak login, user tidak bisa mengakses alamat ini
    if(empty($_SESSION['username'])){
        header('location:login_action.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type=text/css href="style.css">
<title>Latihan 1</title>
</head>
<body>
<div class="header">
    <h2>Home Page</h2>
</div>
<div class="content">
    <?php if (isset($_SESSION['success'])):?>
        <div class="error success">
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION["username"])):?>
        <p>Hallo <strong><?php echo $_SESSION['username'];?></strong></p>
        <p><a href="login.html?logout='1'" style="color:red;">Logout</a></p>
    <?php endif ?>
    <?php
    date_default_timezone_set('Asia/Jakarta');
    echo "Waktu  = ".date('H:i:s a');?>
</div>
</body>
</html>