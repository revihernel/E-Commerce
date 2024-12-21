<?= $this->extend('pages/layoutpages/main'); ?>
<?= $this->section('pages-content'); ?>
<?= $this->include('pages/layoutpages/navpages'); ?>
<div class="container-login">
    <div class="login-box">
        <h2 class="login-title">Buat akun</h2>
        <form action="/register" method="post">
            <div class="input-group">
                <label for="email">Alamat email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="username" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="nohp">Nomor Handphone</label>
                <input type="text" id="nohp" name="no_hp" required>
            </div>
            <div class="input-group form-floating">
                <textarea name="alamat" class="form-control" placeholder="Alamat lengkap anda" id="floatingTextarea" style="height: 150px"></textarea>
                <label for="floatingTextarea">Alamat</label>
            </div>
            <button type="submit" class="login-button">KONFIRMASI DAN LANJUTKAN</button>
        </form>
        <p class="persyaratan">Dengan membuat atau mendaftar akun, Anda menyetujui isi Persyaratan dan Ketentuan & Kebijakan Privasi kami.</p>
    </div>
</div>
<style>
    .container-date {
        margin-top: 15px;
        margin-bottom: 10px;
    }

    .optiongender {
        font-size: 18px;
    }

    .gender-options label {
        cursor: pointer;
        margin-right: 25px;


    }

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