<?php
session_start();

 if (isset($_SESSION['login'])){
   header ("location: index.php");
   exit;
 }
include('config.php'); ?>

<?php
if (isset($_POST['login'])){
	$username	= $_POST['username'];
	$password	= $_POST['password'];


    $result =  mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$username' ");

// cek username
if (mysqli_num_rows($result)== 1){


    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])){


        //set session
        $_SESSION['login']=true;


        header("Location: index.php");
        exit;
    }
}

$error= true;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="login-style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="background">
            <div class="text">
                <h1>Login</h1>
                <p>No Account? <a href="registrasi.php">Sign up</a></p>
            </div>
            <div class="box">
                <form class="form" action="" method="post">
                    <input type="text" class="username" name="username" placeholder="Username" required>
                    <input type="password" class="password" name="password" placeholder="Password" required>
                    <input type="submit" class="button" value="Login" name="login">
                </form>
<?php if (isset($error)) : ?> 
    <p style="color: white; font-style:italic"> username / password salah</p>
    <?php endif;?>
            </div>
        </div>
    </main>
</body>
</html>