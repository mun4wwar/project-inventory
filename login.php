<?php
session_start();

include 'koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Using MD5 for password hashing

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);
    $data = mysqli_fetch_array($result);

    if ($result->num_rows == 1) {
        $_SESSION['login'] = TRUE;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $data['password'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];

        // Login berhasil, arahkan ke halaman lain
        header("Location: index.php?p=home");
        exit;
    } else {
        echo "Login gagal. Silakan coba lagi.";
    };
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form-container {
            max-width: 800px;
            display: flex;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-form {
            flex: 1;
            padding: 40px;
        }

        .login-image {
            flex: 1;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-image img {
            max-width: 100%;
            border-radius: 10px;
        }

        .form-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-login {
            background-color: #007bff;
            color: #ffffff;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row login-container">
            <div class="login-form-container">
                <div class="col-md-6 login-image">
                    <img src="assets/img/signin-image.jpg" alt="Login Image" class="img-fluid">
                </div>
                <div class="col-md-6 login-form">
                    <div class="form-heading">
                        <h2>Login</h2>
                        <p>Selamat datang di Inventory Teknologi Informasi.</p>
                    </div>
                    <?php
                    if (isset($error_message)) {
                        echo '<div class="alert alert-danger">' . $error_message . '</div>';
                    }
                    ?>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-login btn-block">Login</button>
                    </form>
                    <br>
                        Belum Punya Akun ? <a href="register.php" class="" style="margin-top:20px;">Registrasi Disini</a>
                 </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>