<?php
session_start();
include('../database/connection.php');
// cek sesi
if(isset($_SESSION['logged_in'])){
    header('Location: dashboard.php');
    die();
}
// cek post
if(isset($_POST['username'])){
    //cek username
    $queryCekUser = "SELECT * FROM admin WHERE username = '".$_POST['username']."'";
    $resultCekUser = mysqli_query(connection(),$queryCekUser);
    $dataCekUser = mysqli_fetch_array($resultCekUser);
    if($dataCekUser){
        // verif password
        if(password_verify($_POST['password'], $dataCekUser['password'])){
            $_SESSION['logged_in'] = array(
                'id' => $dataCekUser['id_admin'],
                'user' => $dataCekUser['username'],
            );
            header('Location: dashboard.php');
        }else{
            echo '<h1>user / pass salah</h1>';
        }
    }else{
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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">user</label>
        <input type="text" name="username">
        <br>
        <label for="">pass</label>
        <input type="password" name="password">
        <br>
        <button type="submit">login</button>
        
    </form>
</body>
</html>
<?php //} ?>