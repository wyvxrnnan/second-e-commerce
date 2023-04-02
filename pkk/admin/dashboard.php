<?php

include '../sql/connection.php';

if(isset($_GET['delete_item'])){
    $delete_id = $_GET['delete_item'];
    $delete = mysqli_query($conn, "DELETE FROM `tb_barang` WHERE id = $delete_id ") or die('query failed');
    if($delete){
        echo "<script>alert('delete successful')</script>";
        header('location:dashboard.php');
    }else{
        echo "<script>alert('delete failed')</script>";
    };
};

if(isset($_GET['delete_purchase'])){
    $delete_id = $_GET['delete_purchase'];
    $delete = mysqli_query($conn, "DELETE FROM `tb_pembelian` WHERE id = $delete_id ") or die('query failed');
    if($delete){
        echo "<script>alert('delete successful')</script>";
        header('location:dashboard.php');
    }else{
        echo "<script>alert('delete failed')</script>";
    };
};

if(isset($_GET['delete_acc'])){
    $delete_id = $_GET['delete_acc'];
    $delete = mysqli_query($conn, "DELETE FROM `tb_akun` WHERE id = $delete_id ") or die('query failed');
    if($delete){
        echo "<script>alert('delete successful')</script>";
        header('location:dashboard.php');
    }else{
        echo "<script>alert('delete failed')</script>";
    };
};


if(isset($_GET['delete_msg'])){
    $delete_id = $_GET['delete_msg'];
    $delete = mysqli_query($conn, "DELETE FROM `tb_kontak` WHERE id = $delete_id ") or die('query failed');
    if($delete){
        echo "<script>alert('delete successful')</script>";
        header('location:dashboard.php');
    }else{
        echo "<script>alert('delete failed')</script>";
    };
};

if(isset($_POST['update'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploads/'.$update_p_image;
 
    $update_query = mysqli_query($conn, "UPDATE `tb_barang` SET nama = '$update_p_name', harga = '$update_p_price', gambar = '$update_p_image' WHERE id = '$update_p_id'");
 
    if($update_query){
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        echo "<script>alert('product updated!')</script>";
        header('location:dashboard.php');
    }else{
        echo "<script>alert('failed to update product')</script>";
        header('location:form.php');
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
    <link rel="stylesheet" href="../style/dashboard.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="links">
            <a href="dashboard.php"><ion-icon name="pie-chart-outline"></ion-icon></a>
            <a href="form.php"><ion-icon name="cube-outline"></ion-icon></a>
            <a href="../index.php"><ion-icon name="log-out-outline"></ion-icon></a>           
        </div>
    </div>
    <div class="content">
        <div class="card-container">
            <div class="card">
                <div class="left">
                    <ion-icon name="document-text-outline"></ion-icon>
                </div>
                <div class="right">
                    <button class="btn">add</button>
                    <span class="desc">add stock item</span>
                </div>
            </div>

            <div class="card">
                <div class="left">
                    <ion-icon name="pricetag-outline"></ion-icon>
                </div>
                <div class="right">
                    <span class="title">555</span>
                    <span class="desc">registered item</span>
                </div>
            </div>

            <div class="card">
                <div class="left">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
                <div class="right">
                    <span class="title">555</span>
                    <span class="desc">registered user</span>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="header">Items</div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>price</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select_product = mysqli_query($conn, "SELECT * FROM tb_barang");
                            if(mysqli_num_rows($select_product) > 0)
                            {
                                while($row = mysqli_fetch_assoc($select_product)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td>Rp<?php echo number_format($row['harga'], 2,',','.'); ?></td>
                            <td><img src="uploads/<?php echo $row['gambar']; ?>" height="100" alt=""></td>
                            <td class="action">
                                <a href="dashboard.php?edit=<?php echo $row['id']; ?>"><ion-icon name="create-outline"></ion-icon></a>
                                <a href="dashboard.php?delete_item=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"><ion-icon name="trash-outline"></ion-icon></a>
                            </td>
                        </tr>
                        <?php
                            };
                            }    
                            // }else{
                            // echo "<div class='empty'>no product added</div>";
                            // };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php   
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `tb_barang` WHERE id = $edit_id");
            if(mysqli_num_rows($edit_query) > 0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <div class="darkbg">
            <div class="form-container">
                <div class="header">
                    add new item    
                </div>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                    <div class="wrapper">
                        <input type="text" placeholder="Name" name="update_p_name" required value="<?php echo $fetch_edit['nama']; ?>">
                    </div>
                    <div class="wrapper" id="email">
                        <input type="number" placeholder="Price" name="update_p_price" value="<?php echo $fetch_edit['harga']; ?>">
                    </div>
                    <div class="wrapper">
                        <input type="file" name="update_p_image" accept="image/png, image/jpg, image/jpeg" required style="cursor: pointer;">
                    </div>
                    <button type="submit" class="butt" id="butt" name="update">update</button>
                </form>
            </div>
        </div>
        <?php
                    };
                };
                echo "<script>document.querySelector('.darkbg').style.display = 'flex';</script>";
            };
        ?>

        <div class="table-container">
            <div class="header">Recent Order</div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>number</th>
                            <th>email</th>
                            <th>method</th>
                            <th>address</th>
                            <th>item</th>
                            <th>price</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select_purchase = mysqli_query($conn, "SELECT * FROM tb_pembelian");
                            if(mysqli_num_rows($select_purchase) > 0)
                            {
                                while($row = mysqli_fetch_assoc($select_purchase)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['nomer']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['metode']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['total_produk']; ?></td>
                            <td><?php echo $row['total_harga']; ?></td>
                            <td class="action">
                                <a href="dashboard.php?delete_purchase=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"><ion-icon name="trash-outline"></ion-icon></a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-container">
            <div class="header">Recent Customer</div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>username</th>
                            <th>email</th>
                            <th>password</th>
                            <th>role</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select_acc = mysqli_query($conn, "SELECT * FROM tb_akun");
                            if(mysqli_num_rows($select_acc) > 0)
                            {
                                while($row = mysqli_fetch_assoc($select_acc)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td class="action">
                                <a href="dashboard.php?delete_acc=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"><ion-icon name="trash-outline"></ion-icon></a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-container">
            <div class="header">Recent Customer</div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>username</th>
                            <th>email</th>
                            <th>message</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select_msg = mysqli_query($conn, "SELECT * FROM tb_kontak");
                            if(mysqli_num_rows($select_msg) > 0)
                            {
                                while($row = mysqli_fetch_assoc($select_msg)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td class="action">
                                <a href="dashboard.php?delete_msg=<?php echo $row['id']; ?>" onclick="return confirm('are your sure you want to delete this?');"><ion-icon name="trash-outline"></ion-icon></a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>