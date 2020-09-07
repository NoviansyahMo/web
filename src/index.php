<?php session_start();

if (!isset($_SESSION['UserData']['Username'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Quiz Web</title>
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
    <nav>
        <ul class="navigation">
            <li class="navigation-item">
                <a href="#home" class="navigation-link">
                    <img src="assets/images/icon-home.svg" alt="icon-home" />
                    <p>Home</p>
                </a>
            </li>
            <li class="navigation-item">
                <a href="#product" class="navigation-link">
                    <img src="assets/images/icon-box.svg" alt="icon-product" />
                    <span>Product</span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="#customer" class="navigation-link">
                    <img src="assets/images/icon-group.svg" alt="icon-customer" />
                    <span>Customer</span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="#transaction" class="navigation-link">
                    <img src="assets/images/icon-card.svg" alt="icon-transaction" />
                    <span>Transaction</span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="logout.php" class="navigation-link">
                    <img src="assets/images/icon-power.svg" alt="icon-power" />
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <main>
        <section id="home">
            <div class="home-container">
                <h1>Selamat Datang di Website Kami</h1>
                <img src="assets/images/undraw_co-working.svg" alt="img-co-working">
            </div>
        </section>
        <section id="product">
            <div class="container">
                <div class="container-search-product">
                    <input type="search" placeholder="Search Product" id="search-product">
                    <button type="submit" id="btn-search-product">Search</button>
                </div>
                <div class="table-product" id="product-data"></div>
            </div>
            <div class="product-container">
                <div class="insert-product-title">
                    <h3>Insert new Product</h3>
                </div>
                <form method="post" id="insert-product">
                    <input type="text" placeholder="Nama Barang" id="product-name" name="nama_barang" />
                    <input type="text" placeholder="Merek" id="product-brand" name="merek_barang" />
                    <input type="text" placeholder="Tipe" id="product-type" name="tipe_barang" />
                    <input type="number" placeholder="Harga" id="product-price" name="harga_barang" />
                    <input type="number" placeholder="Stock" id="product-stock" name="stok_barang" />
                    <input type="hidden" name="action_product" id="action_product" value="insert" />
                    <input type="hidden" name="kode_barang" id="product-code" />
                    <input type="submit" value="Insert" id="btn-insert-product" />
                </form>
            </div>
        </section>
        <section id="customer">
            <div class="container">
                <div class="container-search-customer">
                    <input type="search" placeholder="Search Customer" id="search-customer">
                    <button type="submit" id="btn-search-customer">Search</button>
                </div>
                <div class="table-customer" id="customer-data"></div>
            </div>
            <div class="customer-container">
                <div class="insert-customer-title">
                    <h3>Insert new Customer</h3>
                </div>
                <form method="post" id="insert-customer">
                    <input type="text" placeholder="Nama Pembeli" id="customer-name" name="nama_pembeli" />
                    <input type="text" placeholder="Jenis Kelamin" id="customer-gender" name="kelamin_pembeli" />
                    <input type="text" placeholder="Alamat Pembeli" id="customer-address" name="alamat_pembeli" />
                    <input type="text" placeholder="Kota Asal" id="customer-city" name="kota_pembeli" />
                    <input type="hidden" name="action_customer" id="action_customer" value="insert" />
                    <input type="hidden" name="kode_pembeli" id="customer-code" />
                    <input type="submit" value="Insert" id="btn-insert-customer" />
                </form>
            </div>
        </section>
        <section id="transaction">
            <div class="table-transaction" id="transaction-data"></div>
            <div class="transaction-container">
                <div class="insert-transaction-title">
                    <h3>Insert new Transaction</h3>
                </div>
                <form method="post" id="insert-transaction">
                    <input type="date" id="transaction-date" name="tanggal_beli" />
                    <input type="number" placeholder="Kode Barang" id="transaction-product-id" name="kode_barang" />
                    <input type="number" placeholder="Kode Pembeli" id="transaction-customer-id" name="kode_pembeli" />
                    <input type="hidden" name="action_transaction" id="action-transaction" value="insert" />
                    <input type="submit" value="Insert" id="btn-insert-transaction" />
                </form>
            </div>
        </section>
    </main>
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="app.js" type="module"></script>
</body>

</html>