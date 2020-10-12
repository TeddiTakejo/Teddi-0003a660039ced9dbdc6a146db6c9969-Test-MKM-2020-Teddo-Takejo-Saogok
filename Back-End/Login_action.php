<?php

include 'koneksi.php';
if (isset($_POST['login'])){
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    //jika form ada yang kosong maka akan muncul pesan
    if(empty($username)){
        array_push($errors, "Username Tidak Boleh kosong");
    }
    if(empty($password)){
        array_push($errors, "Password Tidak Boleh kosong");
    }

    if(count($errors)==0){
        $password = md5($password);
        $query = "SELECT * FROM daftarmahasiswa WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect,$query);
        //log in user
        if(mysqli_num_rows($result)==1){
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Kamu Berhasil Masuk";
          header('location: index_action.php');
        }
        else{
            array_push($errors,"Inputan Email/Password Salah");
        }
    }
}
?>