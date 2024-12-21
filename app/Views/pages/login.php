<?= $this->extend('pages/layoutpages/main'); ?>
<?= $this->section('pages-content'); ?>
<?= $this->include('pages/layoutpages/navpages'); ?>
<div class="container-login">
    <div class="login-box">
        <h2 class="login-title">Masuk ke akun anda</h2>
        <?php if (session()->has('error')) : ?>
            <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
        <?php endif ?>
        <form action="<?= base_url('/login') ?>" method="post">
            <div class="input-group">
                <label for="username">Nama Pengguna:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Kata Sandi:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button" href="dashboardPelanggan">Masuk</button>
        </form>
        <p class="persyaratan">Dengan membuat atau mendaftar akun, Anda menyetujui isi Persyaratan dan Ketentuan & Kebijakan Privasi kami.</p>
    </div>
</div>

<style>
    .container-login {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-box {
        width: 350px;
        margin: 0 auto;
        padding: 20px;
    }

    .login-title {
        font-size: 24px;
        font-weight: 400;
        color: #333;
        margin-bottom: 40px;
        text-align: center;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
        color: #666;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .login-button {
        background-color: black;
        color: #fff;
        padding: 15px 20px;
        border: none;
        display: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;

    }

    .login-button:hover {
        background-color: white;
        color: black;
    }

    .forgot-password {
        text-decoration: none;
        color: #666;
        display: block;
        margin-top: 10px;
        margin-bottom: 15x;
        font-size: 15px;
    }

    .persyaratan {
        text-align: center;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
<?= $this->endSection(); ?>