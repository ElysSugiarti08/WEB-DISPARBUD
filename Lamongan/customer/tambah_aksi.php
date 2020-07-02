<?php 
session_start();
// koneksi database
include '../functions.php';

// menangkap data yang di kirim dari form
$isi = $_POST['isi'];
$userEmail = $_SESSION["email"];

// menginput data ke database
mysqli_query($conn,"INSERT INTO komentar VALUES('','$isi','$userEmail')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>