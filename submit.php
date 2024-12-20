<?php
// memeriksa apakah telah disubmit
if (isset($_POST['username'])) {
    // mengambil data formulir
    $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : null;
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $email = htmlspecialchars($_POST['email']);
    $nm_lengkap = isset($_POST['nm_lengkap']) ? htmlspecialchars($_POST['nm_lengkap']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $json_barang = isset($_POST['json_barang']) ? htmlspecialchars($_POST['json_barang']) : '';

// Array produk dan jumlah
$barang = isset($_POST['barang']) ? $_POST['barang'] : [];
$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : [];

// Encode barang ke JSON
$jeksonbarang = json_encode($barang);

// Hubungkan ke file koneksi
include 'koneksi.php';

// Cek ID untuk insert atau update
$id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';

if (!empty($id)) {
    // Query untuk update data
    $sql = "UPDATE transaksi 
            SET nama_lengkap = '$nm_lengkap', email = '$email', 
                password = '$password', data_barang = '$json_barang' 
            WHERE id = '$id'";
} else {
    // Query untuk insert data baru
    $sql = "INSERT INTO transaksi (nama_lengkap, email, password, data_barang) 
            VALUES ('$nm_lengkap', '$email', '$password', '$jeksonbarang')";
}

// Eksekusi query
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



// menutup koneksi
mysqli_close($conn);

    // Tampilkan data dalam format invoice yang lebih menarik
    $tampil = "
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    margin: 0;
    padding: 0;
    color: #2d3436;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.invoice {
    max-width: 700px;
    margin: 20px;
    padding: 25px;
    background: linear-gradient(135deg, #ffffff, #f3f8ff);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(255, 7, 222, 0.97);
    border: 2px solidrgb(229, 13, 245);
    position: relative;
    overflow: hidden;
}

.invoice::before {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 8px;
    background: linear-gradient(135deg,rgb(5, 255, 226),rgb(39, 247, 11));
    border-radius: 0 8px 8px 0;
}

.header {
    text-align: center;
    margin-bottom: 25px;
}

.header h2 {
    font-size: 30px;
    background: -webkit-linear-gradient(135deg,rgb(255, 255, 0),rgb(255, 5, 255));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: bold;
    letter-spacing: 1px;
}

.header .logo {
    font-size: 22px;
    color:rgb(0, 219, 253);
    font-weight: bold;
    text-transform: uppercase;
    margin-top: 5px;
}

.separator {
    border-bottom: 3px dashed #00cec9;
    margin: 25px 0;
    width: 60%;
    margin-left: auto;
    margin-right: auto;
}

.content {
    font-size: 16px;
    line-height: 1.8;
    color: #636e72;
    margin-bottom: 20px;
}

.content .item {
    margin-bottom: 12px;
    font-weight: 500;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #dfe6e9;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
}

.content .item:hover {
    transform: scale(1.05);
}

.content .item strong {
    color: #00cec9;
    font-weight: bold;
}

.products {
    margin-top: 30px;
    border-top: 3px solid #fab1a0;
    padding-top: 15px;
    color: #2d3436;
}

.products p {
    margin: 8px 0;
    display: flex;
    justify-content: space-between;
    font-size: 15px;
    color: #636e72;
}

.products .total {
    font-size: 18px;
    font-weight: bold;
    color: #fd79a8;
    margin-top: 15px;
    text-align: center;
}

.footer {
    text-align: center;
    margin-top: 30px;
    font-size: 14px;
    color: #b2bec3;
    font-style: italic;
}

.footer a {
    color: #74b9ff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.footer a:hover {
    color: #6c5ce7;
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin-top: 20px;
    box-shadow: 0 4px 12px rgb(255, 0, 0);
    border: 3px solidrgb(255, 0, 0);
}



    </style>
    <div class='invoice'>
        <div class='header'>
            <div class='logo'>KASIR SEDERHANA</div>
            <h2>INVOICE</h2>
            <div class='separator'></div>
                <img src='https://st.depositphotos.com/9876904/56303/v/1600/depositphotos_563031648-stock-illustration-flea-market-concept-fruit-store.jpg' />
            </a>
        </div>
        
        <div class='content'>
            <div class='item'><strong>NIM:</strong> 23050767</div>
            <div class='item'><strong>Nama Anda:</strong> rizqi hasan</div>
            <div class='item'><strong>Username:</strong> $username</div>
            <div class='item'><strong>NamaLengkap:</strong> $nm_lengkap</div>
            <div class='item'><strong>Email:</strong> $email</div>
            <div class='item'><strong>Password:</strong> $password</div>
        </div>

        <div class='products'>
            <h3>Produk yang dipilih:</h3>";
            
            if (!empty($barang)) {
                foreach ($barang as $key => $product) {
                    $produk_quantity = $jumlah[$key];
                    $tampil .= "<p><strong>$product</strong> - Jumlah: $produk_quantity</p>";
                }
            } else {
                $tampil .= "<p>Belum ada produk yang dipilih</p>";
            }
            
            $tampil .= "
        </div>

        <div class='footer'>
            <p>Terima kasih telah berbelanja di Kasir Sederhana!</p>
        </div>
    </div>";

} else {
    $tampil = "Data belum disubmit.";
}

echo $tampil;
?>
