<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center" style="font-weight:bold;">DATA RESERVASI</h2>
    <hr>
    <!-- <a href="/reservasi/create">tambah data</a> -->
    <div class="row">
        <div class="col-lg-6">
            <form action="/reservasi/filterReservasi">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="#checkin">CheckIn</label>
                        <input id="checkin" type="date" class="form-control" name="checkin">
                    </div>
                    <div class="col-lg-5">
                        <label for="#checkout">CheckOut</label>
                        <input id="checkout" type="date" class="form-control" name="checkout">
                    </div>
                    <div class="col-lg-2">
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table border="1" align="center" id="dataTable" class="table table-responsive table table-striped table-dark">
            <tr>
                <th>No</th>
                <th>Pemesan</th>
                <th>Nama kamar</th>
                <th>Tipe kamar</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Status</th>
                <th>Pembayaran</th>
                <th>Setting</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($reservasi as $row) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['nama_kamar']; ?></td>
                    <td><?= $row['tipe_kamar']; ?></td>
                    <td><?= $row['checkin']; ?></td>
                    <td><?= $row['checkout']; ?></td>
                    <td><?= $row['statusr']; ?></td>
                    <td><?= $row['pembayaran']; ?></td>
                    <td><a href="/reservasi/<?= $row['id_reservasi']; ?>/edit" class="btn btn-outline-warning mr-3">EDIT</a>
                        <a href="/reservasi/<?= $row['id_reservasi']; ?>/delete" onclick="return confirm('Apakah Yakin?')" class="btn btn-outline-danger ">DELETE</a>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<style>
    a {
        color: #f0e65a;
    }

    a.hover {
        color: #c2ba4c;
    }
</style>
<?= $this->endSection(); ?>