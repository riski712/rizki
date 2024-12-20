<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            background: linear-gradient(135deg,hsl(306, 96.90%, 50.20%),hsl(316, 97.60%, 50.80%));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        form {
            background-color:rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            box-sizing: border-box;
            transform: scale(1);
            transition: transform 0.3s ease;
        }

        form:hover {
            transform: scale(1.02);
        }

        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: bold;
        }

        img.logo {
            display: block;
            margin: 0 auto 15px;
            width: 120px;
            height: auto;
        }

        table {
            width: 100%;
            border-spacing: 0 8px;
            margin-top: 8px;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        label {
            font-size: 13px;
            color: #333;
            display: inline-block;
            margin-bottom: 4px;
            font-weight: 600;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 2px solid #ccc;
            border-radius: 5px;
            margin-bottom: 12px;
            font-size: 13px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background: #f5f5f5;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="number"]:focus {
            border-color: #33c7fc;
            box-shadow: 0 0 6px rgba(51, 199, 252, 0.5);
            outline: none;
            background: #fff;
        }

        input[type="checkbox"] {
            margin-right: 6px;
        }

        .barang {
            margin-bottom: 16px;
        }

        .barang div {
            margin-bottom: 10px;
        }

        .barang label {
            font-size: 14px;
            font-weight: bold;
            color: #444;
        }

        input[type="submit"] {
            background: linear-gradient(135deg, #33c7fc, rgb(233, 17, 17));
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s ease, transform 0.2s ease;
            width: 100%;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #85f7a2, #33c7fc);
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            margin-top: 16px;
            color: #aaa;
            font-size: 13px;
            font-weight: 300;
        }
    </style>
</head>
<body>

<form action="submit.php" method="post" onsubmit="return validateform()">  
    <img src="https://st.depositphotos.com/9876904/56303/v/1600/depositphotos_563031648-stock-illustration-flea-market-concept-fruit-store.jpg" alt="Toko Buah" class="logo">
    <h2>Pendaftaran</h2>

    <table>
        <tr>
            <td><label for="username">Username</label></td>
            <td>:</td>
            <td><input type="text" id="username" name="username" required></td>
        </tr>
        <tr>
            <td><label for="nm_lengkap">Nama Lengkap</label></td>
            <td>:</td>
            <td><input type="text" id="nm_lengkap" name="nm_lengkap" required></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td>:</td>
            <td><input type="email" id="email" name="email" required></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td>:</td>
            <td><input type="password" id="password" name="password" required></td>
        </tr>

        <tr>
            <td colspan="3" style="text-align: center;">
                <input type="submit" value="Submit">
                <a href="lihat_data.php" style="
                    display: inline-block; 
                    padding: 5px 10px; 
                    background-color: rgb(4, 243, 32); 
                    color: white; 
                    text-decoration: none; 
                    border-radius: 4px; 
                    margin-left: 10px;">Lihat Data</a>
            </td>
        </tr>
    </table>
</form>

<script>
    function validateform() {
        var password = document.getElementById("password").value;
        if (password.length < 6) {
            alert("Password harus memiliki minimal 6 karakter");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
