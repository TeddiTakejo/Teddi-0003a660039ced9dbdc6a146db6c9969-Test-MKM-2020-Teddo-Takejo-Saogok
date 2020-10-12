<?php 
include 'koneksi.php';
$username = "";
$email = "";

//jika user mengklik tombil register maka
if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password_1 = mysqli_real_escape_string($connect, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($connect, $_POST['password_2']);
    
        //jika form ada yang kosong maka akan muncul pesan
        if(empty($username)){
            array_push($errors, "Username Tidak Boleh kosong");
        }
        if(empty($email)){
            array_push($errors, "Email Tidak Boleh kosong");
        }
        if(empty($password_1)){
            array_push($errors, "Password Tidak Boleh kosong");
        }
        if($password_1 != $password_2){
            array_push($errors, "Password Anda masukan salah");
        }
        //jika tidak ada error maka data akan langsung dimasukan kedalam database
        if(count($errors)==0){
            $password = md5($password_1); //encripsi password kedalam database
            
            $sql = "INSERT INTO daftarmahasiswa (username, email, password) VALUES ('$username','$email','$password')";
            
            mysqli_query($connect,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Kamu Berhasil Masuk";
            header('location: index_action.php');
        }
}

//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.html');
}
?>