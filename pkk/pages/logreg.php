<?php
include "../sql/connection.php";

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("location: ../index.html");
}

// register
if(isset($_POST['signup'])) {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $simpan=mysqli_query($conn, "INSERT INTO tb_akun(username, email, password, role) VALUES('$username', '$email', '$password', '00')");
}
//login
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM tb_akun WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql, $role);

    if ($result->num_rows > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['stat_login']=1;
        $_SESSION['username'] = $row['username'];
        
        if($row["role"]=="00")
        {
            header("location: ../index.html");
        }
        // else if($row["posisi"]=="01")
        // {
        //     header("location:admin-only/dashboard.php");
        // }
    } 
    else 
    {
        echo "<script>alert('wrong email or password :(')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYAYSNACK</title>
    <link rel="stylesheet" href="../style/logreg.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="left">
        <img src="../img/people.png" alt="">
    </div>
    <div class="right">
        <a href="../index.html" class="rect"><ion-icon name="close-outline"></ion-icon></a>
        <form class="container" method="post">
            <div class="header">
                <span class="title" id="title">login</span>
                <span class="sub" id="sub">welcome back!</span>
            </div>
            <div class="wrapper">
                <input type="text" placeholder="Name" name="username" required>
            </div>
            <div class="wrapper" id="email">
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="wrapper">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <button type="submit" class="butt" id="butt" name="login">log in</button>
            <div class="link">
                <span id="link">Don't have an account? <button onclick="change()">Sign Up</button></span>
            </div>
        </form>
    </div>
    <script src="../js/logreg.js"></script>
</body>
</html>