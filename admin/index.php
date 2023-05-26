<?php
session_start();
include('../database/connection.php');
// cek sesi
if (isset($_SESSION['logged_in'])) {
    header('Location: dashboard.php');
    die();
}
// cek post
if (isset($_POST['username'])) {
    //cek username
    $queryCekUser = "SELECT * FROM admin WHERE username = '" . $_POST['username'] . "'";
    $resultCekUser = mysqli_query(connection(), $queryCekUser);
    $dataCekUser = mysqli_fetch_array($resultCekUser);
    if ($dataCekUser) {
        // verif password
        if (password_verify($_POST['password'], $dataCekUser['password'])) {
            $_SESSION['logged_in'] = array(
                'id' => $dataCekUser['id_admin'],
                'user' => $dataCekUser['username'],
            );
            header('Location: dashboard.php');
        } else {
            echo '<h1>user / pass salah</h1>';
        }
    } else {
        echo '<h1>user / pass salah</h1>';
    }
    // while($dataCekUser = mysqli_fetch_array($resultCekUser)){
    //     if($dataCekUser['username'] == $_POST['username']){
    //         if(password_verify($_POST['password'], $dataCekUser['password'])){
    //             $_SESSION['logged_in'] = array(
    //                 'id' => $dataCekUser['id_admin'],
    //                 'user' => $dataCekUser['username'],
    //             );
    //             header('Location: dashboard.html');
    //         }else{
    //             echo '<h1>user / pass salah</h1>';
    //         }
    //         echo '<h1>user / pass salah</h1>';
    //     }else{
    //         echo '<h1>user / pass salah</h1>';
    //     }
    // }
    // if(($_POST['user'] == 'admin' && $_POST['password'] == 'admin') || ($_POST['user'] == 'user' && $_POST['password'] == 'user')){
    //     setcookie('user', $_POST['user'], time()+60);
    //     header('Location: home.php');
    // }else{
    //     echo '<h1>user / pass salah</h1>';
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Logo -->
    <link rel="icon" href="../image/logoatas.png" type="image/x-icon" />

    <!-- Bootrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin.css" />
</head>

<body>
    <div class="container-login">
        <div class="layer-1"></div>
        <div class="layer-2"></div>
        <div class="login-boxs">
            <div class="login-box">
                <h2 class="mb-5">Login as Admin</h2>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="username" aria-label="username" aria-describedby="basic-addon1" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" />
                    </div>
                    <div class="w-100 d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-primary w-50">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>
<?php //} 
?>