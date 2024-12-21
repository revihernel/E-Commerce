<?= $this->extend('pages/layoutpages/main'); ?>
<?= $this->section('pages-content'); ?>
<nav>
    <div class="container">
        <h5> <a href="/">Z A L O R A</a></h5>

        <form class="container-search" role="search">
            <input class="search-input bi bi-search" type="search" placeholder="Puma diskon up 50%" aria-label="Search">
        </form>
        <div class="dropdown">
            <?php if (empty($id_pelanggan)) : ?>
                <button class="dropdown-toggle bi bi-person"> Masuk / Daftar</button>
                <ul class="dropdown-menu">
                    <li class="bi bi-box-arrow-right"> <a href="<?= site_url('login'); ?>"> Masuk</a></li>
                    <li class="bi bi-pencil-square"> <a href="<?= site_url('register'); ?>"> Daftar</a></li>
                </ul>
        </div>
    </div>
<?php else : ?>
    <div class="dropdown">
        <button class="dropdown-toggle bi bi-person"> Hi, Pelanggan</button>
        <ul class="dropdown-menu">
            <li class="bi bi-person-fill"><a href="<?= site_url('profile'); ?>"> Profile</a></li>
            <li class="bi bi-box-seam"><a href="<?= base_url('/lihatpesanan') ?>"> Pesanan</a></li>
            <li class="bi bi-box-arrow-left"><a href="<?= site_url('logout'); ?>"> Keluar</a></li>
        </ul>
    </div>
<?php endif; ?>
</div>
</div>
<div class="container-bot-nav">
    <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
                <li><a href="jenisPakaian/<?= esc($category['category_id']) ?>"><?= $category['category']; ?></a></li>
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
<div class="container" style="justify-content: center;">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/iklanzalorra.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/zalorandiskon2.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class=" grid-card">
    <?php if (empty($id_pelanggan)) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <div class="top">
                    <img src="<?= base_url('img/' . $product['filename']) ?>">
                </div>
                <div class="bottom">
                    <span><?= esc($product['name_product']) ?></span>
                    <span>Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                    <a href="<?= site_url('login'); ?>">Cek Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <div class="top">
                    <img src="<?= base_url('img/' . $product['filename']) ?>">
                </div>
                <div class="bottom">
                    <span><?= esc($product['name_product']) ?></span>
                    <span>Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                    <a href="<?= site_url('detailpakaian/' . esc($product['id'])); ?>">Cek Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>