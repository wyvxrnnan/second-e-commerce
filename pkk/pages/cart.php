<?php
session_start();
if(!isset($_SESSION['stat_login']) and !isset($_SESSION['username']) and !isset($_SESSION['password']))
{   
    header('location:logreg.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYAYSNACK</title>
    <link rel="stylesheet" href="../style/cart.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <ion-icon name="cart-outline"></ion-icon>Cart
            <a href="product.php" class="out"><ion-icon name="close-outline"></ion-icon></a>
        </div>
        <div class="wrapper">
            <div class="img-container">
                <img src="../img/chips2.png" alt="">
            </div>
            <div class="detail">
                <div class="name">sample text</div>
                <div class="price" id="price">Rp 10.000</div>
            </div>
            <div class="calc">
                <ion-icon name="remove-outline" id="decrement"></ion-icon>
                <span class="num" id="count">1</span>
                <ion-icon name="add-outline" id="increment"></ion-icon>
                <ion-icon name="trash-outline"></ion-icon>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="total">
            <div class="text">total price :</div>
            <div class="desc">
                <span>Rp</span>
                <span class="num" id="total"></span>
            </div>
        </div>
        <button>
            <ion-icon name="cart-outline"></ion-icon>
            pay now
        </button>
    </div>
    <script src="../js/cart.js"></script>
</body>
</html>