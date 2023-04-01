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
            <a href="form.html"><ion-icon name="cube-outline"></ion-icon></a>
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
                        <tr>
                            <td>1</td>
                            <td>ini produk</td>
                            <td>10.000</td>
                            <td>img</td>
                            <td class="action">
                                <ion-icon name="create-outline"></ion-icon>
                                <ion-icon name="trash-outline"></ion-icon>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>ini produk</td>
                            <td>10.000</td>
                            <td>img</td>
                            <td class="action">
                                <ion-icon name="create-outline"></ion-icon>
                                <ion-icon name="trash-outline"></ion-icon>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>ini produk</td>
                            <td>10.000</td>
                            <td>img</td>
                            <td class="action">
                                <ion-icon name="create-outline"></ion-icon>
                                <ion-icon name="trash-outline"></ion-icon>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-container">
            <div class="header">Recent Order</div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nama</th>
                            <th>nomer</th>
                            <th>email</th>
                            <th>metode</th>
                            <th>jalan</th>
                            <th>kota</th>
                            <th>provinsi</th>
                            <th>pin</th>
                            <th>jumlah</th>
                            <th>harga</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>abieza</td>
                            <td>0878497321</td>
                            <td>anan@gmail.com</td>
                            <td>cash on delivery</td>
                            <td>karadenan</td>
                            <td>bogor</td>
                            <td>jawa barat</td>
                            <td>19420</td>
                            <td>2</td>
                            <td>20.000</td>
                            <td class="action">
                                <ion-icon name="create-outline"></ion-icon>
                                <ion-icon name="trash-outline"></ion-icon>
                            </td>
                        </tr>
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
                        <tr>
                            <td>1</td>
                            <td>abieza</td>
                            <td>anan@gmail.com</td>
                            <td>12345</td>
                            <td>00</td>
                            <td class="action">
                                <ion-icon name="create-outline"></ion-icon>
                                <ion-icon name="trash-outline"></ion-icon>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>