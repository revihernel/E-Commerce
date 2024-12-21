<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan</title>
    <style>
        .card-text {
            font-size: 18px;
            font-weight: 300;
            font-family: "Roboto", sans-serif;
            color: black;
        }
        .detailproduk {
            font-size: 20px;
            font-weight: 300;
            font-family: "Roboto", sans-serif;
            color: black;
        }
        .namametode {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 100;
            font-family: "Roboto", sans-serif;
            color: grey;
        }
        .metodebayar {
            margin-top: 30px;
            font-size: 16px;
            font-weight: 300;
            font-family: "Roboto", sans-serif;
            color: black;
            margin-top: 10px;
        }
        .total {
            font-size: 14px;
            font-weight: 100;
            font-family: "Roboto", sans-serif;
            color: grey;
        }
        .harga {
            margin-top: 30px;
            font-size: 16px;
            font-weight: 300;
            font-family: "Roboto", sans-serif;
            color: black;
        }
        .datapelanggan {
            font-size: 14px;
            font-weight: 100;
            font-family: "Roboto", sans-serif;
            color: grey;
        }
        .pelanggan {
            margin-top: 30px;
            font-size: 16px;
            font-weight: 300;
            font-family: "Roboto", sans-serif;
            color: black;
        }
        .namapengiriman {
            font-size: 14px;
            font-weight: 100;
            font-family: "Roboto", sans-serif;
            color: grey;
        }
        .pengiriman {
            margin-top: 30px;
            font-size: 16px;
            font-weight: 300;
            font-family: "Roboto", sans-serif;
            color: black;
        }
        .container-blok {
            background-color: #fff;
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            font-family: "Roboto", sans-serif;
            color: black;
        }
        h1 {
            font-size: 24px;
            font-family: "Roboto", sans-serif;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        h2, h5 {
            font-family: "Roboto", sans-serif;
            font-size: 20px;
            margin-top: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }
        p {
            font-family: "Roboto", sans-serif;
            font-size: 16px;
            color: gray;
        }
        .row {
            display: flex;
            margin-top: 15px;
        }
        .col-md-3, .col-md-4, .col-md-3 {
            flex: 1;
        }
        .text-center {
            text-align: center;
        }
        .text-end {
            text-align: right;
        }
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            background-color: #f8f8f8;
        }
        .card-text {
            margin: 5px 0;
        }
        .fw-medium {
            font-weight: 500;
        }
        .fs-6 {
            font-size: 16px;
        }
        .fw-light {
            font-weight: 300;
        }
        .fw-bold {
            font-weight: 400;
        }
        .mt-5 {
            margin-top: 20px;
        }
        .d-block {
            display: block;
        }
        .d-flex {
            display: flex;
        }
        .justify-content-end {
            justify-content: flex-end;
        }
        .align-items-end {
            align-items: flex-end;
        }
    </style>
</head>
<body>
    <div class="container-blok">
        <div class="container-show">
            <p class="detailproduk">Detail Produk</p>
            <p>Nomor pemesanan: <?= esc($order['id']); ?></p>
            <div class="row mt-5">
                <div class="col-md-1 text-center">
                    <img src="/img/<?= $filename['filename']; ?>" width="100">
                </div>
                <div class="col-md-4 d-block" style="margin-left: 20px; margin-top: 20px;">
                    <p class="card-text fw-medium fs-7"><b><?= esc($product['name_product']); ?></b></p>
                    <p class="card-text fw-light fs-6">Keterangan: <?= esc($product['description']); ?></p>
                    <p class="card-text fw-light fs-6">Ukuran: <?= esc($size['size']); ?></p>
                </div>
            </div>
            <p class="pengiriman">Pengiriman oleh</p>
            <p class="namapengiriman">ZALORA EXPRESS X</p>
            <p class="pelanggan">Detail Pengiriman</p>
            <p class="datapelanggan"><?= esc($customer['username']); ?></p>
            <p class="datapelanggan"><?= esc($customer['alamat']); ?></p>
            <p class="datapelanggan"><?= esc($customer['no_hp']); ?></p>
            <p class="harga">Detail Harga Produk</p>
            <p class="total">Rp <?= esc($orderDetail['total']); ?></p>
            <p class="metodebayar">Metode Pembayaran</p>
            <p class="namametode"><?= esc($paymentMethod['via_pembayaran']); ?></p>
        </div>
    </div>
</body>
</html>
