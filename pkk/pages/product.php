<?php
include '../sql/connection.php';

if(isset($_POST['add'])){


    $product_id = $_POST['p_id'];
    $product_name = $_POST['p_name'];
    $product_price = $_POST['p_price'];
    $product_image = $_POST['p_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `tb_keranjang` WHERE id = '$product_id'");
 
    if(mysqli_num_rows($select_cart) > 0){
       echo "<script>alert('product is already added')</script>";
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `tb_keranjang`(nama, harga, gambar, jumlah) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
       echo "<script>alert('product added!')</script>";
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
    <link rel="stylesheet" href="../style/product.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="heading">
        <div class="span title">Products / プロダクツ</div>
        <div class="btn">
            <a href="cart.php"><button><ion-icon name="cart-outline"></ion-icon></button></a>
            <a href="index-login.php"><button><ion-icon name="log-out-outline"></ion-icon></button></a>
        </div>
    </div>
    <div class="container">

        <?php 
        $select_product = mysqli_query($conn, "SELECT * FROM tb_barang");
        if(mysqli_num_rows($select_product) > 0) {
            while($fetch_product = mysqli_fetch_assoc($select_product)){
            
        ?>

        <form method="post">
            <div class="card">
                <img src="../admin/uploads/<?php echo $fetch_product['gambar']; ?>" alt="">
                <h3><?php echo $fetch_product['nama']; ?></h3>
                <div class="price">Rp<?php $price = $fetch_product['harga']; echo number_format($price, 2,',','.'); ?></div>
                <input type="hidden" name="p_name" value="<?php echo $fetch_product['nama']; ?>">
                <input type="hidden" name="p_price" value="<?php echo $fetch_product['harga']; ?>">
                <input type="hidden" name="p_image" value="<?php echo $fetch_product['gambar']; ?>">
                <input type="hidden" name="p_id" value="<?php echo $fetch_product['id']; ?>">
                <a href="cart.html"><button class="card-btn" name="add">add to cart</button></a>
            </div>
        </form>
        
        <?php
            };
        };
        ?>
    </div>
</body>
</html>