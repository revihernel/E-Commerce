<?= $this->extend('pelanggan/layoutpelanggan/play'); ?>
<?= $this->section('pelanggan-content'); ?>
<div class="container">
    <?php if (session()->has('message')) : ?>
        <div id="message" class="alert alert-success w-100" role="alert">
            <?= session('message') ?>
        </div>
        <script>
            // Sembunyikan pesan setelah 3 detik
            setTimeout(function() {
                document.getElementById('message').style.display = 'none';
            }, 3000);
        </script>
    <?php endif ?>
</div>
<form  class="form" action="<?= site_url('buatpesanan'); ?>" method="post">
    <input type="hidden" name="username" value="<?= $user['username']; ?>">
    <input type="hidden" name="alamat" value="<?= $user['alamat']; ?>">
    <input type="hidden" name="name_product" value="<?= $product['name_product']; ?>">
    <input type="hidden" name="id_order" value="<?= $order['id']; ?>">
    <div class="container-detail container p-4 w-100">
        <div class="row w-100">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-1 text-center">
                        <i class="bi bi-geo-alt fw-bold fs-4"></i>
                    </div>
                    <div class="col-11 d-block">
                        <div class="card-title fw-bold">
                            <?= $user['username']; ?>
                        </div>
                        <div class="card-text">
                            <?= $user['alamat']; ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-5">
                    <div class="col-md-3 text-center">
                        <img src="/img/<?= $filename['filename']; ?>" width="100">
                    </div>
                    <div class="col-md-4 d-block">
                        <p class="card-text fw-medium fs-6"><?= $product['name_product']; ?></p>
                        <p class="card-text fw-light fs-6"><b>Ukuran:</b> <?= $size['size']; ?></p>
                        <p class="card-text fw-light fs-6"><b>Warna:</b> <?= $color['color']; ?></p>
                        <p class="card-text fw-light fs-6"><b>Jumlah:</b> <?= $order['quantity']; ?></p>
                    </div>
                    <div class="col-md-3 text-end d-flex justify-content-end align-items-end">
                        <p class="card-text fs-6 fw-bold">Rp <?= $product['price']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="iphone w-100">
                        <fieldset>
                            <legend>Payment Method</legend>

                            <div class="form__radios">
                                <div class="form__radio">
                                    <label for="dana">
                                        <img src="/img/dana.svg" width="50">
                                    </label>
                                    <input checked id="dana" name="id_metodePembayaran" type="radio" value="2" />
                                </div>
                                <div class="form__radio">
                                    <label for="bca">
                                        <img src="/img/bca.svg" width="50">
                                    </label>
                                    <input id="bca" name="id_metodePembayaran" type="radio" value="3" />
                                </div>
                                <div class="form__radio">
                                    <label for="icon-bank-bni">
                                        <img src="/img/bni.svg" width="50">
                                    </label>
                                    <input id="icon-bank-bni" name="id_metodePembayaran" type="radio" value="1" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <?php
            $price = $product['price'];
            $quantity = $order['quantity'];
            $biayaPengiriman = 42000;
            $diskon = $product['diskon']; // Mengambil diskon dari produk

            $subtotal = $price * $quantity;
            $jumlahDiskon = ($subtotal * $diskon) / 100;
            $totalSetelahDiskon = $subtotal - $jumlahDiskon;
            $total = $totalSetelahDiskon + $biayaPengiriman;
            ?>
            <input type="hidden" name="total" value="<?= $total ?>">
            <div class="col-md-4">
                <div class="border rounded ms-4 mt-4 p-4 row" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                    <div class="col-sm-6 fw-medium">
                        Subtotal
                    </div>
                    <div class="col-sm-6 fw-medium">
                        Rp <?= number_format($subtotal, 2, ',', '.') ?>
                    </div>
                    <div class="col-sm-6 fw-medium">
                        Diskon (<?= esc($diskon) ?>%)
                    </div>
                    <div class="col-sm-6 fw-medium">
                        - Rp <?= number_format($jumlahDiskon, 2, ',', '.') ?>
                    </div>

                    <div class="col-sm-6 d-block">
                        <div class="fw-medium">Pengiriman</div>
                        <div class="fw-light">Zalora Official express</div>
                    </div>
                    <div class="col-sm-6 fw-light">
                        Rp <?= number_format($biayaPengiriman, 2, ',', '.') ?>
                    </div>
                    <div class="col-sm-6 d-block mt-2">
                        <div class="fw-medium fs-5">Total</div>
                    </div>
                    <div class="col-sm-6 fw-medium fs-5 mt-2">
                        Rp <?= number_format($total, 2, ',', '.') ?>
                    </div>
                    <button type="submit" class="btn btn-dark mt-4">Pesan Sekarang</button>
                </div>
            </div>

        </div>
    </div>
</form>
<!-- Pastikan jQuery sudah ditambahkan -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        // Cek apakah ada pesan sukses di session
        <?php if (session()->getFlashdata('success')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success'); ?>'
            });
        <?php endif; ?>

        // Cek apakah ada pesan error di session
        <?php if (session()->getFlashdata('error')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= session()->getFlashdata('error'); ?>'
            });
        <?php endif; ?>
    });
</script> -->

<script>
    function updateImage(filename) {
        document.getElementById('mainImage').src = '<?= base_url('/img') ?>/' + filename;
    }
</script>

<style>
    fieldset {
        border: 0;
        margin: 0;
        padding: 0;
    }

    legend {
        font-weight: 600;
        margin-block-end: 0.5em;
        padding: 0;
        font-size: 20px;
    }

    input {
        border: 0;
        color: inherit;
        font: inherit;
    }

    input[type="radio"] {
        accent-color: var(--color-primary);
    }

    table {
        border-collapse: collapse;
        inline-size: 100%;
    }

    tbody {
        color: #b4b4b4;
    }

    td {
        padding-block: 0.125em;
    }

    tfoot {
        border-top: 1px solid #b4b4b4;
        font-weight: 600;
    }

    .align {
        display: grid;
        place-items: center;
    }

    .button {
        align-items: center;
        background-color: var(--color-primary);
        border-radius: 999em;
        color: #fff;
        display: flex;
        gap: 0.5em;
        justify-content: center;
        padding-block: 0.75em;
        padding-inline: 1em;
        transition: 0.3s;
    }

    .button:focus,
    .button:hover {
        background-color: #e96363;
    }

    .button--full {
        inline-size: 100%;
    }

    .card {
        border-radius: 1em;
        background-color: var(--color-primary);
        color: #fff;
        padding: 1em;
    }

    .form {
        display: grid;
        gap: 2em;
    }

    /* #feffe */
    /* .form__radios {
        display: grid;
        gap: 1em;
        
    }

    .form__radio {
        
        align-items: center;
        background-color: black;
        border-radius: 1em;
        box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
        display: flex;
        padding: 1em;
    }
 */

    .form__radios {
        display: flexbox;
        gap: 0.5em;
        /* grid-template-columns: repeat(auto-fit, minmax(600px, 2fr)); */
        padding: 0.5em;
        background-color: #f0f0f0;

    }

    .form__radio {
        align-items: center;
        background-color: white;
        border-radius: 1em;
        box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
        display: flex;
        padding: 1em;
        transition: background-color 0.3s ease, transform 0.3s ease;

    }

    .form__radio:hover {
        background-color: #b4b4b4;
        transform: scale(1.01);
    }



    .form__radio label {
        align-items: center;
        display: flex;
        flex: 1;
        gap: 1em;
        font-size: 1em;

    }

    .header {
        display: flex;
        justify-content: center;
        padding-block: 0.5em;
        padding-inline: 1em;
    }

    .icon {
        block-size: 1em;
        display: inline-block;
        fill: currentColor;
        inline-size: 1em;
        vertical-align: middle;
    }

    .iphone {
        background-color: #fbf6f7;
        background-image: linear-gradient(to bottom, #fbf6f7, #fff);
        border-radius: 2em;
        block-size: 812px;
        box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
        inline-size: 375px;
        overflow: auto;
        padding: 2em;
    }

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
<?= $this->endSection(); ?>