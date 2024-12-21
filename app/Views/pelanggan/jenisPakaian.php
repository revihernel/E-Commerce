<?= $this->extend('pelanggan/layoutpelanggan/play'); ?>
<?= $this->section('pelanggan-content'); ?>
<nav>
    <div class="container">
        <h5> <a href="/">Z A L O R A</a></h5>

        <form class="container-search" role="search">
            <input class="search-input bi bi-search" type="search" placeholder="Puma diskon up 50%" aria-label="Search">
        </form>
        <?php if (isset($username)) : ?>
            <div class="dropdown">
                <button class="dropdown-toggle bi bi-person"> Hi, Pelanggan</button>
                <ul class="dropdown-menu">
                    <li class="bi bi-person-fill"> <a href="profile"> Profile</a></li>
                    <li class="bi bi-box-seam"> <a href="<?= base_url('/lihatpesanan') ?>"> Pesanan</a></li>
                    <li class="bi bi-box-arrow-left"> <a href="/"> Keluar</a></li>
                </ul>
            </div>
        <?php else : ?>
            <div class="container-other">
                <div class="dropdown">
                    <button class="dropdown-toggle bi bi-person"> Masuk / Daftar</button>
                    <ul class="dropdown-menu">
                        <li class="bi bi-box-arrow-right"> <a href="login"> Masuk</a></li>
                        <li class="bi bi-pencil-square"> <a href="register"> Daftar</a></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div class="bi bi-handbag" href="keranjang"></div>
    </div>
    <div class="container-bot-nav">
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href="<?= esc($category['category_id']) ?>"><?= $category['category']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</nav>
<style>
    .bi.bi-handbag {
        font-size: 20px;

    }

    .bi.bi-heart {
        font-size: 20px;
        margin-left: 5px;
        margin-right: 20px;
        /* Set the desired font size */
    }

    .dropdown-toggle {
        padding: 20px 25px;
        /* Adjust padding if needed */
        background-color: #eee;
        /* Light background color */
        border: 1px solid #ddd;
        /* Thin border */
        border-radius: 5px;
        /* Rounded corners */
        cursor: pointer;
        /* Indicate interactivity on hover */
        transition: background-color 0.3s ease;
        /* Smooth background color change on hover */
    }

    .dropdown-toggle:hover {
        background-color: #f8f8f8;
        /* Lighter background on hover */
    }

    .dropdown-menu {
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        display: none;

    }

    .dropdown-menu li {
        padding: 10px;
        /* Increase padding for better spacing */
        list-style: none;
        margin-left: 12px;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .dropdown-menu li:hover {
        background-color: #f0f0f0;
        /* Highlight on hover */
    }

    .dropdown-menu li a {
        text-decoration: none;
        color: #333;
        transition: color 0.2s ease;
        margin-left: 10px;
        /* Smooth color change on hover */
    }

    .dropdown-menu li a:hover {
        color: #000;
        /* Darker text on hover */
    }

    .dropdown:hover .dropdown-menu {
        display: flex;
        flex-direction: column;
        /* Show on hover */
    }


    .container {
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
        /* Light gray background */
        padding: 10px 20px;
        /* Add some padding */
    }

    h5 {
        margin-right: 90px;
        color: #000;
        font-size: 28px;
        margin-left: 9px;
        /* Black text */
    }

    .search-input {
        height: 35px;
        font-weight: 400;
        border: 1px solid #ccc;
        /* Light gray border */
        border-radius: 20px;
        /* Rounded corners */
        padding: 5px 15px;
        /* Add some padding */
        width: 700px;
    }

    .container-other {
        margin-left: 75px;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }

    .logo {
        display: block;
    }

    .logo img {
        width: 100px;
        height: auto;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline-block;
        margin-right: 20px;
    }

    nav a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000;
    }

    nav a i {
        font-size: 20px;
        margin-right: 5px;
    }

    /* Efek hover */
    nav a:hover {
        color: #333;
    }



    .container-bot-nav {
        display: flex;
        justify-content: space-between;
        /* Space links evenly */
        margin-left: 120px;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline-block;
        margin-right: 40px;
        /* Adjust spacing between links */
    }

    nav a {
        text-decoration: none;
        color: #000;
        font-weight: 635;
        /* Make text bold */
    }
</style>


<?php if (empty($products)) : ?>
    <div class="container w-100 justify-content-center">
        <h3 style="font-size:20px;color:grey; font-family:roboto; margin-top:50px;">Product not found</h3>
    </div>
<?php else : ?>
    <div class="grid-card mt-5">
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <div class="top">
                    <?php if ($product['filename']) : ?>
                        <img src="<?= base_url('img/' . $product['filename']) ?>" alt="<?= esc($product['name_product']); ?>">
                    <?php else : ?>
                        <p>Gambar tidak tersedia</p>
                    <?php endif; ?>
                </div>
                <div class="bottom">
                    <span><?= esc($product['name_product']); ?></span>
                    <span>Rp <?= number_format($product['price'], 0, ',', '.'); ?></span>
                    <?php if (isset($id_pelanggan)) : ?>
                        <a href="detailpakaian/<?= esc($product['id']); ?>">Cek Detail</a>
                    <?php else : ?>
                        <a href="/login">Cek Detail</a>
                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
    <?= $this->endSection(); ?>

    <style>
        .container h3 {
            font-size: 100px;
        }
    </style>