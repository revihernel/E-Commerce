<?= $this->extend('admin/layoutadmin/go'); ?>
<?= $this->section('admin-content'); ?>
<?= $this->include('admin/layoutadmin/navadmin'); ?>
<title>Z A L O R A | Pakaian</title>
<link rel="icon" type="image/x-icon" href="./img/zaloranicon.png">
<div class="container-fluid">
    <a class="tambahPakaian btn btn-success" href="viewtambahpakaian">Tambah Pakaian</a>
    <table id="tabelPakaian">
        <thead>
            <tr>
                <th class="text-center">Id Pakaian</th>
                <th class="text-center">Nama Pakaian</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($pakaian) && !empty($pakaian)): ?>
                <?php foreach ($pakaian as $item): ?>
                    <tr>
                        <td class="text-center"><?= $item['id_pakaian'] ?></td>
                        <td class="text-center"><?= $item['name_product'] ?></td>
                        <td class="text-center"><?= $item['price'] ?></td>
                        <td class="text-center"><?= $item['stock'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('pakaian/edit/' . $item['id']) ?>">Edit</a> |
                            <a href="<?= base_url('pakaian/delete/' . $item['id']) ?>" onclick="return confirm('Yakin ingin menghapus pakaian ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pakaian yang ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<style>
    .tambahPakaian {
        margin: 0px 0px 10px 0px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>
<?= $this->include('admin/layoutadmin/footer'); ?>
<?= $this->endSection(); ?>