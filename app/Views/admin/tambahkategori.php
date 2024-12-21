<?= $this->extend('admin/layoutadmin/go'); ?>
<?= $this->section('admin-content'); ?>
<?= $this->include('admin/layoutadmin/navadmin'); ?>
<div class="container-fluid">
    <h4>Tambah Kategori</h4>
    <form id="formKategoriPakaian" method="POST" action="<?= base_url('admin/tambahkategori_p') ?>">
        <label for="category">Kategori Pakaian:</label>
        <input type="text" id="category" name="category" required>
        <a class="btn btn-danger" type="submit" href="kategoripakaian">Batal</a>
        <button class="btn btn-success" type="submit">Simpan</button>
    </form>
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