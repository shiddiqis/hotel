<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center" style="font-weight:bold;">DATA FASILITAS</h2>
    <hr>
    <a href="/fasilitas/create" style="margin:5px;" class="btn btn-outline-warning mr-3">TAMBAH DATA</a>
    <table border="1" align="center" class="table-responsive table table-striped table-dark">
        <thead>
            <tr>
                <th>Id fasilitas</th>
                <th>Nama fasilitas</th>
                <th>Detail fasilitas</th>
                <th>Setting</th>
            </tr>
        </thead>
        <?php foreach ($fasilitas as $row) : ?>
            <tbody>
                <tr>
                    <td><?= $row['id_fasilitas']; ?></td>
                    <td><?= $row['nama_fasilitas']; ?></td>
                    <td><?= $row['detail_fasilitas']; ?></td>
                    <td><a href="/fasilitas/<?= $row['id_fasilitas']; ?>/edit" style="margin:5px;" class="btn btn-outline-warning mr-3">EDIT</a>
                        <br>
                        <a href="/fasilitas/<?= $row['id_fasilitas']; ?>/delete" onclick="return confirm('Apakah Yakin?')" class="btn btn-outline-danger mr-3">DELETE</a>
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