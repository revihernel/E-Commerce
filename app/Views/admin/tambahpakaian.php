<?= $this->extend('admin/layoutadmin/go'); ?>
<?= $this->section('admin-content'); ?>
<?= $this->include('admin/layoutadmin/navadmin'); ?>
<div class="container">
    <div class="card">
        <h4 class="card-header">Tambah Pakaian</h4>
        <form id="formTambahPakaian" method="post" action="<?= base_url('admin/tambahpakaian') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="id">Id Pakaian:</label>
    <input type="text" class="form-control" id="id" name="id_pakaian" required>

    <label for="name">Nama Pakaian:</label>
    <input type="text" class="form-control" id="name" name="name_product" required>

    <label for="description">Deskripsi:</label>
    <input type="text" class="form-control" id="description" name="description" required>

    <label for="price">Harga:</label>
    <input type="text" class="form-control" id="price" name="price" required>

    <label for="diskon">Diskon:</label>
    <input type="text" class="form-control" id="diskon" name="diskon" required>

    <label for="category_id">Kategori:</label>
    <select name="category_id" class="form-control" id="category_id" required>
        <?php foreach ($kategori as $kategori) : ?>
            <option value="<?= $kategori['category_id'] ?>"><?= $kategori['category'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="color_id">Warna:</label>
    <select name="color_id" class="form-control" id="color_id" required>
        <?php foreach ($warna as $warna) : ?>
            <option value="<?= $warna['id'] ?>"><?= $warna['color'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="stock">Stok:</label>
    <input type="text" class="form-control" id="stock" name="stock" required>

    <div class="button-pakaian">
        <a class="btn btn-danger" href="pakaian">Batal</a>
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</form>

    </div>

</div>

<style>
    .button-pakaian {
        margin-top: 20px;
        margin-left: 20px;
    }

    #modalTambahPakaian {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border: 1px solid #ddd;
        z-index: 10;
    }

    #formTambahPakaian {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    #formTambahPakaian label {
        display: block;
        margin-bottom: 5px;
    }

    #formTambahPakaian input[type="text"],
    #formTambahPakaian input[type="number"] {
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>
<?= $this->include('admin/layoutadmin/footer'); ?>
<?= $this->endSection(); ?>