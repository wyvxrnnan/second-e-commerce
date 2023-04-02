<?php 

include '../sql/connection.php';

if(isset($_POST['add']))
{
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploads/'.$p_image;
    
    $insert_query = mysqli_query($conn, "INSERT INTO `tb_barang`(nama, harga, gambar) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

    if($insert_query){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        echo "<script>alert('Product Added!')</script>";
    }
    else
    {
         echo "<script>alert('Failed to add product')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin only</title>
    <link rel="stylesheet" href="../style/form.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="links">
            <a href="dashboard.php"><ion-icon name="pie-chart-outline"></ion-icon></a>
            <a href="form.html"><ion-icon name="cube-outline"></ion-icon></a>
            <a href="../index.php"><ion-icon name="log-out-outline"></ion-icon></a>           
        </div>
    </div>
    <div class="content">
        <div class="form-container">
            <div class="header">
                add new item    
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="wrapper">
                    <input type="text" placeholder="Name" name="p_name" required>
                </div>
                <div class="wrapper" id="email">
                    <input type="number" placeholder="Price" name="p_price">
                </div>
                <div class="wrapper">
                    <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" required style="cursor: pointer;">
                </div>
                <button type="submit" class="butt" id="butt" name="add">submit</button>
            </form>
        </div>
    </div>
</body>
</html>