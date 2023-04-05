<?php 

function connection() {
   // membuat konekesi ke database system
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "transupn";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass);
   $conn->query("SET FOREIGN_KEY_CHECKS=0;");
   if(! $conn) {
	die('Koneksi gagal: '.mysqli_error());
   }
   //memilih database yang akan dipakai
   mysqli_select_db($conn,$dbName);
	
   return $conn;
}
?>