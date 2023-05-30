<?php
function connection()
{
    // membuat koneksi ke database
    $dbServer = 'localhost';
    $dbPort = 3306;
    $dbUser = 'root';
    $dbPass = 'Hubed.com1';
    $dbName = 'bayview';

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName, $dbPort);

    if (!$conn) {
        die('Koneksi gagal: ' . mysqli_connect_error());
    }

    // memilih database yang akan dipakai
    mysqli_select_db($conn, $dbName);

    return $conn;
}
