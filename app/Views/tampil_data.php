<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center" style="font-weight:bold;">DATA USER</h2>
    <hr>
    <table border="1" align="center" class="table-responsive table table-striped table-hover table-dark ">
        <thead>
            <tr>
                <th>id user</th>
                <th>Email</th>
                <!-- <th>password</th> -->
                <th>Username</th>
                <th>NIK</th>
                <th>Gender</th>
                <th>Akses</th>
                <th>Setting</th>
        </thead>
        <?php $i = 1 ?>

        <?php foreach ($admin as $row) : ?>

            <tbody>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['NIK']; ?></td>
                    <td><?= $row['gender']; ?></td>
                    <td><?= $row['akses']; ?></td>
                    <td><a href="/admin/<?= $row['id_user']; ?>/edit" class="btn btn-outline-warning mr-3">EDIT</a>
                        <a href="/admin/<?= $row['id_user']; ?>/delete" onclick="returnconfirm('Apakah Yakin menghapus data user')" class="btn btn-outline-danger mr-3">DELETE</a>
                    </td>
                </tr>
            </tbody>
            <?php $i++ ?>
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