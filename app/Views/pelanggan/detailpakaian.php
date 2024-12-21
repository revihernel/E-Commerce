<?= $this->extend('pelanggan/layoutpelanggan/play'); ?>
<?= $this->section('pelanggan-content'); ?>
<nav>
    <div class="container">
        <h5> <a href="/">Z A L O R A</a></h5>

        <form class="container-search" role="search">
            <input class="search-input bi bi-search" type="search" placeholder="Puma diskon up 50%" aria-label="Search">
        </form>
        <div class="container-other">
            <div class="dropdown">
                <button class="dropdown-toggle bi bi-person"> Hi, Pelanggan</button>
                <ul class="dropdown-menu">
                    <li class="bi bi-person-fill"> <a href="profile"> Profile</a></li>
                    <li class="bi bi-box-seam"> <a href="<?= base_url('/lihatpesanan') ?>"> Pesanan</a></li>
                    <li class="bi bi-box-arrow-left"> <a href="/"> Keluar</a></li>
                </ul>
            </div>
        </div>
        <div class="bi bi-handbag" href="keranjang"></div>
    </div>
    <div class="container-bot-nav">
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href="/jenisPakaian/<?= $category['category_id']; ?>"><?= $category['category']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</nav>
<style>
    .bi.bi-handbag {
        font-size: 20px;

    }

    .bi.bi-heart {
        font-size: 20px;
        margin-left: 5px;
        margin-right: 20px;
        /* Set the desired font size */
    }

    .dropdown-toggle {
        padding: 20px 25px;
        /* Adjust padding if needed */
        background-color: #eee;
        /* Light background color */
        border: 1px solid #ddd;
        /* Thin border */
        border-radius: 5px;
        /* Rounded corners */
        cursor: pointer;
        /* Indicate interactivity on hover */
        transition: background-color 0.3s ease;
        /* Smooth background color change on hover */
    }

    .dropdown-toggle:hover {
        background-color: #f8f8f8;
        /* Lighter background on hover */
    }

    .dropdown-menu {
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        display: none;

    }

    .dropdown-menu li {
        padding: 10px;
        /* Increase padding for better spacing */
        list-style: none;
        margin-left: 12px;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .dropdown-menu li:hover {
        background-color: #f0f0f0;
        /* Highlight on hover */
    }

    .dropdown-menu li a {
        text-decoration: none;
        color: #333;
        transition: color 0.2s ease;
        margin-left: 10px;
        /* Smooth color change on hover */
    }

    .dropdown-menu li a:hover {
        color: #000;
        /* Darker text on hover */
    }

    .dropdown:hover .dropdown-menu {
        display: flex;
        flex-direction: column;
        /* Show on hover */
    }


    .container {
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
        /* Light gray background */
        padding: 10px 20px;
        /* Add some padding */
    }

    h5 {
        margin-right: 90px;
        color: #000;
        font-size: 28px;
        margin-left: 9px;
        /* Black text */
    }

    .search-input {
        height: 35px;
        font-weight: 400;
        border: 1px solid #ccc;
        /* Light gray border */
        border-radius: 20px;
        /* Rounded corners */
        padding: 5px 15px;
        /* Add some padding */
        width: 700px;
    }

    .container-other {
        margin-left: 75px;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }

    .logo {
        display: block;
    }

    .logo img {
        width: 100px;
        height: auto;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline-block;
        margin-right: 20px;
    }

    nav a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000;
    }

    nav a i {
        font-size: 20px;
        margin-right: 5px;
    }

    /* Efek hover */
    nav a:hover {
        color: #333;
    }



    .container-bot-nav {
        display: flex;
        justify-content: space-between;
        /* Space links evenly */
        margin-left: 120px;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline-block;
        margin-right: 40px;
        /* Adjust spacing between links */
    }

    nav a {
        text-decoration: none;
        color: #000;
        font-weight: 635;
        /* Make text bold */
    }
</style>
<div class="container-detail">
    <div class="left-column">
        <img id="mainImage" src="<?= base_url('img/' . $product['filename']) ?>" alt="Product Image">
    </div>
    <div class="right-column">
        <span><?= esc($product['name_product']) ?></span>
        <span><?= esc($product['description']) ?></span>
        <span>
            <p>Rp <?= esc($product['price']) ?></p>
        </span>
        <form action="<?= base_url('pemesanan') ?>" method="POST">
            <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
            <input type="hidden" name="price" value="<?= esc($product['price']) ?>">
            <div class="options">
                <?php foreach ($attachments as $attachment) : ?>
                    <input type="radio" id="gambar<?= esc($attachment['color_id']) ?>" name="color_id" value="<?= esc($attachment['color_id']) ?>" onclick="updateImage('<?= esc($attachment['filename']) ?>')">
                    <label for="gambar<?= esc($attachment['color_id']) ?>">
                        <img src="<?= base_url('../' . 'img/' . $attachment['filename']) ?>" alt="Option Image">
                    </label>
                <?php endforeach; ?>
            </div>
            <select name="size_id" class="form-select" aria-label="Default select example" required>
                <option selected>Ukuran</option>
                <?php foreach ($sizes as $size) : ?>
                    <option value="<?= esc($size['id']) ?>"><?= esc($size['size']) ?></option>
                <?php endforeach; ?>
            </select>
            <span class="mb-1 mt-4">Quantity</span>
            <p class="qty">
                <button class="qtyminus" aria-hidden="true">&minus;</button>
                <input type="number" name="quantity" id="qty" min="1" max="10" step="1" value="1">
                <button class="qtyplus" aria-hidden="true">&plus;</button>
            </p>
            <button  type="submit" style="
                margin-top:30px;
                font-size:14px;
                width:100%;
                height:45px;
                border-radius:4px;
                background:#000;
                color:#fff;">Checkout</button>
        </form>
    </div>
</div>

<script>
    function updateImage(filename) {
        document.getElementById('mainImage').src = '<?= base_url('/img') ?>/' + filename;
    }
</script>
<style>
    .options {
        display: flex;
        justify-content: start;
        gap: 5px;
        margin-bottom: 20px;
    }

    .options input[type="radio"] {
        display: none;
    }

    .options label {
        width: 65px;
        height: 90px;
        display: flex;
        padding: 3px;
        gap: 15px;
        justify-content: center;
        align-items: center;
        border: 1px solid #ECEBEC;
        border-radius: 1px;
        background-color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .options label img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .options input[type="radio"]:checked+label {
        border: 1px solid black;
        border-radius: 2px;
        transform: scale(1.1);
    }

    .container-detail {
        display: grid;
        grid-template-columns: 3fr 2fr;
        gap: 10px;
        width: 90%;
        max-width: 100%;
        margin: auto;
        padding: 40px 40px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        place-content: center;
    }

    .left-column img {
        width: 100%;
        height: 100;
        border-radius: 8px;
        display: flex;
        transition: 0.4;
        object-fit: cover;
        overflow: hidden;
    }

    .left-column img:hover {
        transform: scale(1.1);
    }

    .right-column {
        height: 1000;

        display: flex;
        flex-direction: column;

        padding: 0px 40px;
    }

    .right-column span {
        display: block;
        margin-bottom: 8px;
        font-size: 1.2em;
        text-decoration: solid;
    }


    .container-detail .right-column span:first-child {
        font-weight: 550;
        font-size: 20px;
    }

    .container-detail .right-column span:nth-child(2) {
        font-weight: 300;
        font-size: 17px;
        color: grey;
    }

    .container-detail .right-column span:nth-child(3) p {
        margin-top: 30px;
        font-weight: bold;
        font-size: 24px;
        color: rgb(184 24 24);
        padding: 5px;
        border-radius: 15px;
        border: 1px solid rgb(184 24 24);
        text-align: center;
    }


    .container-detail .right-column span:nth-child(5) {
        font-weight: 550;
        font-size: 20px;
        color: black;
    }

    .container-detail .right-column button {
        padding: 0;
        margin: 0;
        border-style: none;
        touch-action: manipulation;
        display: inline-block;
        border: none;
        background: none;
        cursor: pointer;
    }



    .container-detail .right-column .qty {
        display: flex;
        align-items: start;
        flex-wrap: wrap;
        justify-content: start;
        text-align: center;
        margin: 0;
    }

    .container-detail .right-column label {
        text-align: start;
    }

    .container-detail .right-column input {
        width: 5rem;
        height: 2rem;
        font-size: 1.3rem;
        text-align: center;
        border: 1px solid black;
    }

    .container-detail .right-column button {
        width: 2rem;
        height: 2rem;
        color: #fff;
        font-size: 2rem;
        background: black;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container-detail .right-column button.qtyminus {
        margin-right: 0.3rem;
    }

    .container-detail .right-column button.qtyplus {
        margin-left: 0.3rem;
    }
</style>
<script>
    var input = document.querySelector('#qty');
    var btnminus = document.querySelector('.qtyminus');
    var btnplus = document.querySelector('.qtyplus');

    if (input !== undefined && btnminus !== undefined && btnplus !== undefined && input !== null && btnminus !== null && btnplus !== null) {

        var min = Number(input.getAttribute('min'));
        var max = Number(input.getAttribute('max'));
        var step = Number(input.getAttribute('step'));

        function qtyminus(e) {
            var current = Number(input.value);
            var newval = (current - step);
            if (newval < min) {
                newval = min;
            } else if (newval > max) {
                newval = max;
            }
            input.value = Number(newval);
            e.preventDefault();
        }

        function qtyplus(e) {
            var current = Number(input.value);
            var newval = (current + step);
            if (newval > max) newval = max;
            input.value = Number(newval);
            e.preventDefault();
        }

        btnminus.addEventListener('click', qtyminus);
        btnplus.addEventListener('click', qtyplus);

    } // End if test
</script>
<?= $this->endSection(); ?>