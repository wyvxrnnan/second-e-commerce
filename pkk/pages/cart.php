<?php
include '../sql/connection.php';

session_start();
if(!isset($_SESSION['stat_login']) and !isset($_SESSION['username']) and !isset($_SESSION['password']))
{   
    header('location:logreg.php');
}

if(isset($_POST['update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `tb_keranjang` SET jumlah = '$update_value' WHERE id = '$update_id'");
    if($update_quantity_query){
       header('location:cart.php');
    };
};

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `tb_keranjang` WHERE id = '$remove_id'");
    header('location:cart.php');
};

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
        <?php 
            
            $select_cart = mysqli_query($conn, "SELECT * FROM `tb_keranjang`");
            $grand_total = 0;
            $grand_total2 = 0;
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        ?>
        <div class="wrapper">
            
            <div class="img-container">
                <img src="../admin/uploads/<?php echo $fetch_cart['gambar']; ?>" alt="">
            </div>
            <div class="detail">
                <div class="name"><?php echo $fetch_cart['nama']; ?></div>
                <div class="price" id="price">Rp<?php $harga =  $fetch_cart['harga']; echo number_format($harga, 2,',','.'); ?></div>
            </div>
            <form class="calc" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" class="num" min="1"  value="<?php echo $fetch_cart['jumlah']; ?>" >
                  <input type="submit" name="update_btn" class="update" value="update">
                  <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')"><ion-icon name="trash-outline" class="trash"></ion-icon></a>
            </form>  
        </div>
        <?php
                $sub_total = $fetch_cart['harga'] * $fetch_cart['jumlah'];
                $grand_total += $sub_total;
                $grand_total2 = number_format($grand_total, 2,',','.');
                };
            };
        ?>
    </div>

    <div class="panel">
        <div class="total">
            <div class="text">total price :</div>
            <div class="desc">
                <span>Rp<?php echo $grand_total2; ?></span>
                <span class="num" id="total"></span>
            </div>
        </div>
        <a href="checkout.php" class="<?= ($grand_total2 > 1)?'':'disabled'; ?>">
            <button>
                <ion-icon name="cart-outline"></ion-icon>
                pay now
            </button>
        </a>
    </div>
    <!-- <script src="../js/cart.js"></script> -->
</body>
</html>