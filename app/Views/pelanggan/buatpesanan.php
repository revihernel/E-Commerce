<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Virtual Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .bank-logo {
            display: block;
            margin: 0 auto 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: start;
        }

        .btn-copy {
            display: inline-block;
            margin-left: 10px;
            padding: 5px 10px;
            font-size: 0.875em;
        }
    </style>
</head>

<body>

    <div class="container text-center">
        <h4 class="mb-4">PEMBAYARAN VIRTUAL ACCOUNT</h4>
        <p>Hi <?= $user['username']; ?>,</p>
        <p style="font-size:14px;">Anda akan menerima e-mail dan SMS sebagai bukti konfirmasi pemesanan Anda.</p>
        <img src="/img/<?= $paymentMethod['icon']; ?>" width="150" class="bank-logo">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Alamat</th>
                    <td><?= $user['alamat']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Pemesanan</th>
                    <td><?= (new DateTime($order['tanggal_pemesanan']))->format('d F Y'); ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?= $paymentMethod['via_pembayaran']; ?></td>
                </tr>
                <tr class="text-justify">
                    <th>No Virtual Account</th>
                    <td class="fw-bold text-secondary">
                        <?= $paymentMethod['nomor']; ?>
                        <a class="btn btn-outline-secondary btn-copy" onclick="copyToClipboard('<?= $paymentMethod['nomor']; ?>')">Salin</button>
                    </td>
                </tr>
                <tr>
                    <th>Jumlah Pembayaran</th>
                    <td class="fw-bold text-secondary">
                        Rp <?= number_format($order['total'], 2, ',', '.') ?>
                        <button class="btn btn-outline-secondary btn-copy" onclick="copyToClipboard('<?= $order['total']; ?>')">Salin</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-danger">PENTING! Lakukan pembayaran untuk proses pengiriman</p>
        <a href="<?= site_url('lihatpesanan/' . esc($order['id'])); ?>" class="btn btn-dark mt-4">Lihat pesanan</a>

    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Copied to clipboard');
            }, function() {
                alert('Failed to copy');
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
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
</script>

</body>

</html>