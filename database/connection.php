<?php
function connection() {
    // membuat konekesi ke database system
    $dbServer = 'localhost';
    $dbPort = 3306;
    $dbUser = 'root';
<<<<<<< HEAD
    $dbPass = '';
    $dbName = "bayview";
=======
    $dbPass = 'Hubed.com1';
    $dbName = "bayview (1)";
>>>>>>> 9c545d2a4f113e053593d83eb8f96c450f6487f1
   
   $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName, $dbPort);

   if(! $conn) {
	die('Koneksi gagal: ' . mysqli_error());
   }
   //memilih database yang akan dipakai
   mysqli_select_db($conn,$dbName);
	
   return $conn;
}
<<<<<<< HEAD
=======

?>
>>>>>>> 9c545d2a4f113e053593d83eb8f96c450f6487f1
