<?= $this->extend('template/headeruser') ?>
<?= $this->section('content'); ?>
<style>
    body {
        background-color: black;
    }

    div {
        color: white;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    button {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 100px;
    }
</style>
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>KAMAR</h2>
            <h3>Pesan <span>Kamar</span> yang tersedia</h3>
            <p>Hotel kami menyediakan 3 jenis tipe kamar yaitu : Standart , Superior , Presidential</p>
        </div>

        <div class="row portfolio-container">
            <?php foreach ($kamar as $row) : ?>
                <div class=" portfolio-item filter-app ">
                    <img src="<?= base_url() ?>/assets/img/kamar/<?= $row['gambar'] ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><?= $row['nama_kamar'] ?></h4>
                        <h5><?= $row['tipe_kamar'] ?></h5>
                        <p><?= $row['fasilitas'] ?></p>
                        <br>
                        <h4 align="center">HARGA : <?= $row['harga'] ?></h4>
                        <a href="../assets/img/kamar/<?= $row['gambar'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-zoom-in"></i></a>
                        <a href="/pemesanan/<?= $row['id_kamar'] ?>" class="details-link" title="More Details"></i></a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<form action="/pesanKamar" method="POST">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <? foreach ($kamar as $row) : ?>
                <input type="hidden" name="id_reservasi">
                <input type="hidden" value="<?= session()->get('id') ?>" name="id_user">
                <input type="hidden" value="<?= $row['id_kamar'] ?>" name="id_kamar">
                <input type="hidden" value="<?= $row['harga'] ?>" name="pembayaran">
                <input type="hidden" name="status">
                <div class="form-group">
                    <label for="#checkin">Checkin:</label>
                    <input type="date" class="form-control" placeholder="masukan tgl checkin" name="checkin">
                </div>
                <div class="form-group">
                    <label for="#checkout">Checkout:</label>
                    <input type="date" class="form-control" placeholder="masukan tgl checkout" name="checkout">
                </div>
                <button type="submit" style="margin-top : 10px" class="btn btn-warning">Pesan</button>

                <!-- <button type="submit" class="btn btn-success"></button> -->
        </div>
        <div class="col-lg-3"></div>
    <? endforeach; ?>
    </div>

</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?= $this->endSection(); ?>