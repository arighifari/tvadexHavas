<?php

$dbhost = 'localhost:3306';
$dbname = 'Havas';
$dbuser = 'root';
$dbpass = 'arighifari23';

$conn = mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    echo "<script>alert('Gagal Koneksi');</script>";
}

?>
