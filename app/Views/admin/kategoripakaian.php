<?= $this->extend('admin/layoutadmin/go'); ?>
<?= $this->section('admin-content'); ?>
<?= $this->include('admin/layoutadmin/navadmin'); ?>
<div class="container-fluid">
    <a class="tambahkategori btn btn-success" href="tambahkategori">Tambah Kategori</a>
    <table>
        <thead>
            <tr>
                <th class="text-center">Id Kategori</th>
                <th class="text-center">Nama Kategori</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
    </table>
</div>
<style>
    .tambahkategori {
        margin: 0px 0px 10px 0px;
    }

    table {
        width: 100%;
        border-style: solid;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>
<?= $this->include('admin/layoutadmin/footer'); ?>
<?= $this->endSection(); ?>