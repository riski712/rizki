<?php
// Menghubungkan ke file koneksi.php
include 'koneksi.php';

// Query untuk mengambil semua data dari tabel transaksi
$query = "SELECT id, nama, email, nim, password, data_barang FROM transaksi";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
    <style>
        table {
    border-collapse: collapse;
    width: 100%;
    margin: 20px 0;
    font-family: 'Arial', sans-serif;
    font-size: 16px;
    color: #333;
    text-align: left;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

table, th, td {
    border: none;
}

th, td {
    padding: 12px 15px;
}

th {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
}

tr {
    background-color: #f8f9fa;
    transition: all 0.2s ease-in-out;
}

tr:nth-child(even) {
    background-color: #eef2f3;
}

tr:hover {
    background-color: #dfe6e9;
    transform: scale(1.02);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

td {
    border-bottom: 1px solid #dee2e6;
}

td:last-child {
    text-align: center;
}

    </style>
</head>
<body>

<h2>Data Transaksi</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>NIM</th>
        <th>Password</th>
        <th>Data Barang</th>
        <th>Aksi</th>
    </tr>

    <?php
    // Menampilkan data per baris
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['nama']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['nim']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "<td>".$row['data_barang']."</td>";
        echo "<td><a href='edit.php?id=".$row['id']."'>EDIT</a> | <a href='hapus.php?id=".$row['id']."'>HAPUS</a></td>";
        echo "</tr>";
    }
    ?>

    <?php
    // Menutup koneksi
    mysqli_close($conn);
    ?>

</table>

</body>
</html>
