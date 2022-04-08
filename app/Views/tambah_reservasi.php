<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center"><?= $judul; ?></h2>
    <form action="/reservasi/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table align="center" class="table-responsive table table-striped table-dark">
            <tbody>
                <tr>
                    <td>ID_reservasi</td>
                    <td><input class="form-control" type="number" value="<?= $row['id_reservasi']; ?>" name="id_reservasi"></td>
                </tr>
                <tr>
                    <td>ID_user</td>
                    <td><input class="form-control" type="number" value="<?= $row['id_user']; ?>" name="id_user"></td>
                </tr>
                <tr>
                    <td>ID_kamar</td>
                    <td><input class="form-control" type="number" value="<?= $row['id_kamar']; ?>" name="id_kamar"></td>
                </tr>
                <tr>
                    <td>checkin</td>
                    <td><input class="form-control" type="text" value="<?= $row['checkin']; ?>" name="checkin"></td>
                </tr>
                <tr>
                    <td>checkout</td>
                    <td><input class="form-control" type="text" value="<?= $row['checkout']; ?>" name="checkout"></td>
                </tr>
                <tr>
                    <td>pembayaran</td>
                    <td><input class="form-control" type="text" value="<?= $row['pembayaran']; ?>" name="pembayaran"></td>
                </tr>
                <tr>
                    <td>status</td>
                    <td>
                        <select class="form-control form-control-sm" name="status">
                            <option value="sudah bayar">sudah dibayar</option>
                            <option value="belum bayar">belum dibayar</option>
                            <option value="keluar"> keluar</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-outline-success mr-3">save</button>
                        <a href="/reservasi">
                            <button type="button" class="btn btn-outline-danger mr-3">Cancel</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?= $this->endSection(); ?>