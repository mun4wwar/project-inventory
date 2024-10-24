<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory Barang</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ecf0f5;
            color: #2c3e50;
        }

        header {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .welcome-message {
            text-align: center;
            padding: 20px;
            background-color: #3498db;
            color: #000;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            flex: 1;
            min-width: 300px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            color: #2c3e50;
        }

        .card p {
            color: #7f8c8d;
        }

        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }

        .image-container {
            text-align: center;
            margin-top: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>


<div class="welcome-message">
        <p style="font-size: 18px;">SELAMAT DATANG DI</p>
        <h1 style="font-size: 28px;">SISTEM INFORMASI INVENTORY</h1>
    </br>
        <img src="assets/img/ti.png" alt="Deskripsi Gambar Selamat Datang">
        <!-- <img src="assets/img/c1.jpeg" alt="Deskripsi Gambar"> -->
    </div>
    <div class="image-container">
    </div>
    <div class="dashboard-container">
        <?php if($_SESSION['level']=='admin'){
            ?>
        <div class="card">
            <h2 style="color: #e74c3c;">Daftar Barang</h2>
            <p></p>
            <a href="index.php?p=jbarang" class="link-primary text-end" style="color: #3498db; font-weight: bold;"><p><small> Lihat Daftar Barang <i class="fas fa-arrow-circle-right"></i></small><p></a>
        </div>
        <div class="card">
            <h2 style="color: #f39c12;">Barang Masuk</h2>
            <p></p>
            <a href="index.php?p=barangMasuk" class="link-primary text-end" style="color: #3498db; font-weight: bold;"><p><small> Lihat Barang Masuk <i class="fas fa-arrow-circle-right"></i></small><p></a>
        </div>
        <?php } ?>
        <div class="card">
            <h2 style="color: #27ae60;">Barang yang dipinjam</h2>
            <p></p>
            <a href="index.php?p=jpinjam" class="link-primary text-end" style="color: #3498db; font-weight: bold;"><p><small> Lihat Daftar DiPinjam <i class="fas fa-arrow-circle-right"></i></small><p></a>
        </div>
    </div>
    <div class="chart-container">
        <!-- Di sini bisa ditambahkan chart atau grafik menggunakan library seperti Chart.js -->
        <!-- Contoh:
        <canvas id="myChart" width="400" height="400"></canvas>
        -->
    </div>
</body>

</html>