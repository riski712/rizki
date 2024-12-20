<?php
include 'koneksi.php';

//ambil ID dari URL
$id = $_GET['id'];

//query untuk mengambil data berdasarkan id
$query = "SELECT * FROM transaksi WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("query error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("data tidak ditemukan!");
}

//sertakan file tampilan form
include 'kiki1.php';
?>