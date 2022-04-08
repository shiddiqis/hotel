<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center" style="font-weight:bold;">DATA KAMAR</h2>
    <hr>
    <a href="/kamar/create" style="margin:5px;" class="btn btn-outline-warning ">TAMBAH DATA</a>
    <table border="1" align="center" class="table table-striped table-hover table-dark">
        <thead>
            <tr>
                <th>Id kamar</th>
                <th>Nama kamar</th>
                <th>Tipe kamar</th>
                <th>Fasilitas</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Setting</th>
            </tr>
        </thead>
        <?php foreach ($kamar as $row) : ?>
            <tbody>
                <tr>
                    <td><?= $row['id_kamar']; ?></td>
                    <td><?= $row['nama_kamar']; ?></td>
                    <td><?= $row['tipe_kamar']; ?></td>
                    <td><?= $row['fasilitas']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td><img style="width: 100px;" src="../assets/img/kamar/<?= $row['gambar']; ?>" alt=""></td>

                    <td><a href="/kamar/<?= $row['id_kamar']; ?>/edit" style="margin:5px;" class="btn btn-outline-warning ">EDIT</a>
                        <a href="/kamar/<?= $row['id_kamar']; ?>/delete" onclick="return confirm('Apakah Yakin?')" class="btn btn-outline-danger ">DELETE</a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
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