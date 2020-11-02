
<?php include('config.php'); ?>
<?php include('function.php'); ?>

<?php

if (isset($_POST['register'])){

    if (registrasi($_POST)>0){
        echo '<script>alert("Berhasil daftar."); document.location="login.php";</script>';
    } else {
        echo mysqli_error($koneksi);
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="signup-style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="background">
            <div class="text">
                <h1>Signup</h1>
                <p>Have Account? <a href="login.php">Login</a></p>
            </div>
            <div class="box">
                <form class="form" action="" method="post">
                                     
                    <input type="text" class="username" name="username"placeholder="Username" required>
                    <input type="password" class="password" name="password" placeholder="Password" required>
                    <input type="password" class="password" name="password2"placeholder="konfirmasi password" required>
                    <input type="submit" class="button" value="Daftar" name="register">
                </form>
            </div>
        </div>
    </main>
</body>
</html>