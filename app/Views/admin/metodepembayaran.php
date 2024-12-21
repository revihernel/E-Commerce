<?= $this->extend('admin/layoutadmin/go'); ?>
<?= $this->section('admin-content'); ?>
<?= $this->include('admin/layoutadmin/navadmin'); ?>

<div class="container-fluid">
    <a class="tambahpembayaran btn btn-success" href="tambahbarang">Tambah Metode Pembayaran</a>
    <table id="tabelPakaian">
        <thead>
            <tr>
                <th class="text-center">Id Pembayaran</th>
                <th class="text-center">Nama Pembayaran</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
    </table>
</div>
<style>
.tambahpembayaran {
        margin: 0px 0px 10px 0px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-style: solid;
        border-color: grey;
        
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>
<?= $this->include('admin/layoutadmin/footer'); ?>
<?= $this->endSection(); ?>