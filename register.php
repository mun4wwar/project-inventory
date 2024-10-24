<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            background-color: #fff;
            margin: 50px auto;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .register-image {
            flex: 1;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-image img {
            max-width: 100%;
            border-radius: 5px 0 0 5px;
        }

        .register-form {
            flex: 1;
            padding: 25px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .btn-warning {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        .btn-warning:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container align-item-center">
        <div class="register-image">
            <img src="assets/img/signup-image1.jpg" alt="Register Image" class="img-fluid">
        </div>
        <div class="register-form">
            <h2>Register</h2>
            <form action="proses_register.php?proses=insert" method="POST">
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin :</label>
                    <div class="col-sm-10">
                        <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">No HP :</label>
                    <input type="number" class="form-control" name="nohp" id="nohp" required>
                </div>
                <div class="form-group">
                    <label for="level">Level:</label>
                    <select name="level" id="level" class="form-select">
                        <option value="">--Pilih Level--</option>
                        <option value="user">Dosen</option>
                        <option value="user">Mahasiswa</option>
                    </select>
                </div>

                <div class="col-12">
                    <input type="submit" name="submit" value="Register" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
