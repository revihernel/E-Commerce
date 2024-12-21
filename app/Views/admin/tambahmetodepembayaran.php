<?= $this->extend('admin/layoutadmin/go'); ?>
<?= $this->section('admin-content'); ?>
<?= $this->include('admin/layoutadmin/navadmin'); ?>
<div class="container-fluid">
    <h4>Tambah Metode Pembayaran</h4>
    <form>
        <label for="namaPakaian">Merk:</label>
        <input type="text" id="namaPakaian" name="namaPakaian" required>

        <label for="namaPakaian">Nama Pakaian:</label>
        <input type="text" id="namaPakaian" name="namaPakaian" required>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required>
    </form>
</div>
<div class="button-pakaian">
    <a class="btn btn-danger" type="submit" href="metodepembayaran">Batal</a>
    <a class="btn btn-success" type="submit" href="metodepembayaran">Simpan</a>
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