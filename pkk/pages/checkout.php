<?php
@include '../sql/connection.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['address'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `tb_keranjang`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['nama'] .' ('. $product_item['jumlah'] .') ';
         $product_price = $product_item['harga'] * $product_item['jumlah'];
         $price_total2 = $price_total += $product_price;
         $price_total3 = number_format($price_total2, 2,',','.');
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `tb_pembelian`(nama, nomer, email, metode, alamat, total_produk, total_harga) VALUES('$name','$number','$email','$method','$address','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
        <div class='message-container'>
            <h3>thank you!</h3>
            <div class='order-detail'>
                <span> item : ".$total_product."</span>
                <span class='total'> total : Rp".$price_total3."  </span>
            </div>
            <div class='customer-details'>
                <p> name : <span>".$name."</span> </p>
                <p> phone number : <span>".$number."</span> </p>
                <p> email : <span>".$email."</span> </p>
                <p> address : <span>".$address."</span> </p>
                <p> payment method : <span>".$method."</span> </p>
            </div>
            <a href='product.php' class='btn'>return</a>
        </div>
    </div>
      ";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="../style/checkout.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="body">
        <div class="checkout-form">
            <form method="post">
                <div class="display-order">
                    <a href="cart.php" class="return"><ion-icon name="close-outline"></ion-icon></a>
                    <?php
                        $select_cart = mysqli_query($conn, "SELECT * FROM `tb_keranjang`");
                        $total = 0;
                        $grand_total = 0;
                        if(mysqli_num_rows($select_cart) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                            $total_price = $fetch_cart['harga'] * $fetch_cart['jumlah'];
                            $grand_total = $total += $total_price;
                            $grand_total2 = number_format($grand_total, 2,',','.');
                    ?>
                    <div class="wrapper">
                        <span class="title">items</span>
                        <span class="hr"></span>
                        <span><?= $fetch_cart['nama']; ?>(<?= $fetch_cart['jumlah']; ?>)</span>
                    </div>
                    <?php
                        }
                    }else{
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                    ?>
                    <div class="wrapper">
                        <span class="title">total payment</span>
                        <span class="hr"></span>
                        <span class="grand-total">Rp<?= $grand_total2; ?></span>
                    </div>
                </div>
                <div class="container">
                    <div class="inputBox">
                        <span>full name</span>
                        <input type="text" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>phone number</span>
                        <input type="number" name="number" required>
                    </div>
                    <div class="inputBox">
                        <span>email</span>
                        <input type="email" name="email" required>
                    </div>
                    <div class="inputBox">
                        <span>payment method</span>
                        <select name="method">
                            <option value="Cash On Delivery" selected>cash on delivery</option>
                            <option value="credit card">e-payment</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>address</span>
                        <input type="text" name="address" required>
                    </div>
                    <input type="submit" value="done" name="order_btn" class="btn">
                </div>
            </form>
        </div>
    </div>  
</body>
</html>