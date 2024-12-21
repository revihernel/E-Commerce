<?= $this->extend('admin/layoutadmin/go'); ?>
<?= $this->section('admin-content'); ?>
<?= $this->include('admin/layoutadmin/navadmin'); ?>
<div class="container">
    <div class="card">
        <h4 class="card-header">Tambah Pakaian</h4>
        <form id="formTambahPakaian" method="post" action="<?= base_url('admin/kelolagambar') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar Product</label>
                <input class="form-control" type="file" name="filename" id="formFile">
            </div>
            <label for="product_id">ID Product</label>
            <select name="product_id" class="form-control" id="product_id" required>
                <?php foreach ($products as $product) : ?>
                    <option value="<?= $product['id'] ?>"><?= $product['name_product'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="color_id">Warna</label>
            <select name="color_id" class="form-control" id="color_id" required>
                <?php foreach ($warna as $warna) : ?>
                    <option value="<?= $warna['id'] ?>"><?= $warna['color'] ?></option>
                <?php endforeach; ?>
            </select>

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